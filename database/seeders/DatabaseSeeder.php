<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            CountrySeeder::class,
            GenreSeeder::class,
            CreatorSeeder::class,
            FilmSeeder::class,
            FilmRolesSeeder::class,
            FilmCountrySeeder::class,
            FilmGenreSeeder::class,
            FilmCreatorSeeder::class,
        ]);
    }
}
