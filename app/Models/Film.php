<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'year', 'budget ', 'description', 'rate', 'length', 'user_id', 'views'
    ];

    public function user () {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function genres() {
        return $this->belongsToMany(Genre::class, 'film_genre');
    }

    public function marks() {
        return $this->belongsToMany(User::class, 'marks')->withPivot('value');
    }

    public function comments() {
        return $this->belongsToMany(User::class, 'comments')->withPivot('name');
    }

    public function countries() {
        return $this->belongsToMany(Country::class, 'film_country');
    }

    public function creators() {
        return $this->belongsToMany(Creator::class, 'film_creator');
    }

    public function getAllAttribute()
    {
        $attributes = $this->getAttributes();
        $attributes['countries'] = $this->countries->map(function ($country) {
            return $country->name;
        })->toArray();
        $attributes['creators'] = $this->creators->map(function ($actor){
            return [
                'id' => $actor->id,
                'name' => $actor->name,
                'country' => $actor->country->name,
                'photo' => $actor->photo,
                'roles' => $actor->roles()->where('film_id', $this->id)->get()->map(function ($role) {
                    return $role->name;
                })->toArray()
            ];
        })->toArray();
        return $attributes;
    }

    public function viewed() {
        return $this->belongsToMany(User::class, 'user_view_film');
    }

    public function getCountRateAttribute() {
        return $this->marks()->sum('value') / $this->marks()->count();
    }

}
