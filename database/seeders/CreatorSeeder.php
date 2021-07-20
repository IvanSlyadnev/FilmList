<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CreatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $creators = [
            [
                'id' => 1,
                'country_id' => 2,
                'name' => 'Джоли'
            ],
            [
                'id' => 2,
                'country_id' => 1,
                'name' => 'Пит'
            ]
        ];

        foreach ($creators as $creator) {
            DB::table('creators')->insert([
               'id' => $creator['id'],
               'country_id' => $creator['country_id'],
               'name' => $creator['name']
            ]);
        }
    }
}
