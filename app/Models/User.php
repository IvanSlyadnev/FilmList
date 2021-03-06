<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function films () {
        return $this->hasMany(Film::class);
    }

    public function comments() {
        return $this->belongsToMany(User::class, 'comments')->withPivot('name', 'id');
    }

    public function roles() {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function isAdmin() {
        return $this->roles()->where('name', 'Администратор')->exists();
    }

    public function isFilmographer() {
        return $this->roles()->where('name', 'Фильмограф')->exists();
    }

    public function canEditFilm($film) {
        return $this->isAdmin() || ($this->isFilmographer() && $this->films->contains($film));
    }

    public function views() {
        return $this->belongsToMany(Film::class, 'user_view_film');
    }

    public function marks() {
        return $this->belongsToMany(Film::class, 'marks')->withPivot('value');
    }
}
