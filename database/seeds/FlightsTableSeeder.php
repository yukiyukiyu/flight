<?php

use Illuminate\Database\Seeder;

class FlightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('flights')->insert([
            'flight_number' => 'ABC123',
            'price' => 100,
            'capacity' => 50,
            'departure_airport_id' => 1,
            'port_id' => 1,
            'departure_time' => '2019-12-16 23:21:00',
            'expected_delay' => 0,
            'arrival_airport_id' => 2,
            'expected_arrival_time' => '2019-12-17 1:21:00',
            'expected_arrival_delay' => 0,
        ]);
    }
}
