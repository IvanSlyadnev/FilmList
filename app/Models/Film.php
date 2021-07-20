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

    public function creator () {
        return $this->belongsTo(User::class);
    }

}
