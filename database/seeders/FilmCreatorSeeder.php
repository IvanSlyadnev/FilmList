<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmCreatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('film_creator')->insert([
            'id' => 1,
            'creator_id' => 1,
            'film_id' => 1,
            'film_role_id' => 1
        ]);
        DB::table('film_creator')->insert([
            'id' => 2,
            'creator_id' => 1,
            'film_id' => 1,
            'film_role_id' => 2
        ]);
        DB::table('film_creator')->insert([
            'id' => 3,
            'creator_id' => 1,
            'film_id' => 2,
            'film_role_id' => 1
        ]);
    }
}
