<?php

namespace App\Models;

use App\Traits\Maping;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    use Maping;

    protected $fillable = [
        'id', 'name', 'flag'
    ];

    public function films() {
        return $this->belongsToMany(Film::class, 'film_country');
    }

}
