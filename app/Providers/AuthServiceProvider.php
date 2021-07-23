<?php

namespace App\Providers;

use App\Models\Creator;
use App\Models\Film;
use App\Models\Team;
use App\Policies\CreatorPolicy;
use App\Policies\FilmPolicy;
use App\Policies\TeamPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
        Film::class => FilmPolicy::class,
        Creator::class => CreatorPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
