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


}
