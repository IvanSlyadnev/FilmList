<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            [
                'id' => 1,
                'name' => 'Ужастки'
            ],
            [
                'id' => 2,
                'name' => 'Коммедии'
            ]
        ];

        foreach ($genres as $genre) {
            DB::table('genres')->insert([
                'id' => $genre['id'],
                'name' => $genre['name']
            ]);
        }
    }
}
