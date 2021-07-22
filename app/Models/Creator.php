<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'country_id', 'photo', 'biography', 'age'
    ];

    public function country() {
        return $this->belongsTo(Country::class);
    }

    public function films() {
        return $this->belongsToMany(Film::class, 'film_creator')->withPivot('film_role_id');
    }

    public function roles() {
        return $this->belongsToMany(FilmRole::class, 'film_creator')->withPivot('film_id');
    }

    public function getAllAttribute() {
        $attributes = $this->getAttributes();
        $attributes['country'] = $this->country->name;
        return $attributes;
    }

}
