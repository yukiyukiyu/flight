<?php

use Illuminate\Database\Seeder;

class AirportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('airports')->insert([
            'city' => '北京',
            'name' => '首都国际机场',
        ]);
        DB::table('airports')->insert([
            'city' => '沈阳',
            'name' => '桃仙机场',
        ]);
    }
}
