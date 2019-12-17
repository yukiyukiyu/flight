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
        $airport->name = '桃仙机场';
        $airport->save();

        $port = new Port;
        $port->airport_id = 1;
        $port->name = '1';
        $port->position = '一层';
        $port->save();

        $port = new Port;
        $port->airport_id = 1;
        $port->name = '50';
        $port->position = '地下一层';
        $port->save();

        $port = new Port;
        $port->airport_id = 2;
        $port->name = 'A1';
        $port->position = '一层';
        $port->save();

        $port = new Port;
        $port->airport_id = 2;
        $port->name = 'E50';
        $port->position = '二层';
        $port->save();

        $flight = new Flight;
        $flight->flight_number = 'ABC123';
        $flight->price = 100;
        $flight->capacity = 50;
        $flight->departure_airport_id = 1;
        $flight->port_id = 1;
        $flight->departure_time = now();
        $flight->expected_delay = 0;
        $flight->arrival_airport_id = 2;
        $flight->expected_arrival_time = now();
        $flight->expected_arrival_delay = 0;
        $flight->save();
    }
}
