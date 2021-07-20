<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'name', 'year', 'budget', 'description', 'rate', 'length', 'user_id'
    ];

    public function user () {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function genres() {
        return $this->belongsToMany(Genre::class, 'film_genre');
    }

    public function marks() {
        return $this->hasMany(Mark::class);
    }

    public function comments() {
        return $this->belongsToMany(User::class, 'comments')->withPivot('name');
    }

    public function countries() {
        return $this->belongsToMany(Country::class, 'film_country');
    }

}
