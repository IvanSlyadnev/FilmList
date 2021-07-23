<?php

namespace App\Models;

use App\Traits\Maping;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmRole extends Model
{
    use HasFactory;
    use Maping;

    protected $fillable = [
        'id', 'name'
    ];

    public function creators() {
        return $this->belongsToMany(Creator::class, 'film_creator')->withPivot('film_id');
    }


}
