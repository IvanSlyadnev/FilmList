<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'year', 'budget', 'description', 'rate', 'length', 'user_id', 'views'
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
        return $this->belongsToMany(User::class, 'comments')->withPivot('name' ,'id');
    }

    public function countries() {
        return $this->belongsToMany(Country::class, 'film_country');
    }

    public function creators() {
        return $this->belongsToMany(Creator::class, 'film_creator')->distinct();
    }

    public function roles() {
        return $this->belongsToMany(FilmRole::class, 'film_creator')->distinct();
    }

    public function getAllAttribute()
    {
        $attributes = collect($this->getAttributes())->only((new Film())->getFillable())->toArray();
        $attributes['id'] = $this->id;
        $attributes['countries'] = $this->countries->map(function ($country) {
            return $country->id;
        })->toArray();
        $attributes['genres'] = $this->genres->map(function ($genre) {
            return $genre->id;
        });
        $attributes['creators'] = $this->creators->map(function ($actor){
            return [
                'id' => $actor->id,
                'name' => $actor->name,
                'country' => $actor->country->name,
                'photo' => $actor->photo,
                'roles' => $actor->roles()->where('film_id', $this->id)->get()->map(function ($role) {
                    return $role->id;
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
