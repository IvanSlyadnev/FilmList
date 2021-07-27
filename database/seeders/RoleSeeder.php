<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
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
                'name' => 'Администратор'
            ],
            [
                'id' => 2,
                'name' => 'Фильмограф'
            ]
        ];
        foreach ($roles as $role) {
            DB::table('roles')->insert([
                'id' => $role['id'],
                'name' => $role['name']
            ]);
        }
    }
}
