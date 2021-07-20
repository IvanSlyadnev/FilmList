<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'name', 'country_id', 'photo'
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

}
