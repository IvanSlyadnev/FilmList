<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $films = [
            [
                'id' => 1,
                'name' => 'Фильм 1',
                'year' => 2000,
                'budget' => 1000,
                'length' => 100,
                'user_id' => 1,
            ],
            [

                'id' => 2,
                'name' => 'Фильм 2',
                'year' => 2000,
                'budget' => 1000,
                'length' => 100,
                'user_id' => 1,
            ],
            [

                'id' => 3,
                'name' => 'Фильм 3',
                'year' => 2000,
                'budget' => 1000,
                'length' => 100,
                'user_id' => 1,
            ]
        ];
        foreach ($films as $film) {
            DB::table('films')->insert([
                'id' => $film['id'],
                'name' => $film['name'],
                'year' => $film['year'],
                'budget' => $film['budget'],
                'length' => $film['length'],
                'user_id' => $film['user_id']
            ]);
        }
    }
}
