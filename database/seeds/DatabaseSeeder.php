<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Admin;
use App\Airport;
use App\Port;
use App\Flight;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->username = 'admin';
        $user->password =  Hash::make('admin');
        $user->role = 0;
        $user->save();
        
        $admin = new Admin;
        $admin->user_id = 1;
        $admin->save();

        $airport = new Airport;
        $airport->city = '北京';
        $airport->name = '首都国际机场';
        $airport->save();

        $airport = new Airport;
        $airport->city = '沈阳';
        $airport->name = '桃仙国际机场';
        $airport->save();

        $airport = new Airport;
        $airport->city = '北京';
        $airport->name = '大兴国际机场';
        $airport->save();

        $flight = new Flight;
        $flight->flight_number = '南方航空CZ6110';
        $flight->price = 1080;
        $flight->capacity = 150;
        $flight->departure_airport_id = 1;
        $flight->departure_time = '2020-01-14 22:10';
        $flight->expected_delay = 0;
        $flight->arrival_airport_id = 2;
        $flight->expected_arrival_time = '2020-01-14 23:55';
        $flight->expected_arrival_delay = 0;
        $flight->save();

        $flight = new Flight;
        $flight->flight_number = '中国国航CA8195';
        $flight->price = 1290;
        $flight->capacity = 150;
        $flight->departure_airport_id = 3;
        $flight->departure_time = '2020-01-14 08:20';
        $flight->expected_delay = 0;
        $flight->arrival_airport_id = 2;
        $flight->expected_arrival_time = '2020-01-14 09:55';
        $flight->expected_arrival_delay = 0;
        $flight->save();

        $flight = new Flight;
        $flight->flight_number = '中国国航CA1651';
        $flight->price = 1290;
        $flight->capacity = 335;
        $flight->departure_airport_id = 1;
        $flight->departure_time = '2020-01-14 08:50';
        $flight->expected_delay = 0;
        $flight->arrival_airport_id = 2;
        $flight->expected_arrival_time = '2020-01-14 10:25';
        $flight->expected_arrival_delay = 0;
        $flight->save();
    }
}
