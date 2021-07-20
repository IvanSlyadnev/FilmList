<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [1=>'Россия', 2 => 'США', 3 => 'Германия'];

        foreach ($countries as $key => $country) {
            DB::table('countries')->insert([
                'id' => $key,
                'name' => $country
            ]);
        }
    }
}
