<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'name', 'flag'
    ];

    public function films() {
        return $this->belongsToMany(Film::class, 'film_country');
    }


}
