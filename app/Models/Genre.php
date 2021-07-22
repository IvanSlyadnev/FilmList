<?php

namespace App\Models;

use App\Traits\Maping;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Film;


class Genre extends Model
{
    use HasFactory;
    use Maping;

    protected $fillable = [
        'id', 'name'
    ];

    public function films() {
        return $this->belongsToMany(Film::class, 'film_genre');
    }
}
