<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id' => 1,
                'name' => 'Актер'
            ],
            [
                'id' => 2,
                'name' => 'Композитор'
            ],
            [
                'id' => 3,
                'name' => 'Режисер'
            ]
        ];

        foreach ($roles as $role) {
            DB::table('film_roles')->insert([
                'id' => $role['id'],
                'name' => $role['name']
            ]);
        }
    }
}
