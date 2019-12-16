<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(PassengersTableSeeder::class);
        $this->call(AirportsTableSeeder::class);
        $this->call(PortsTableSeeder::class);
        $this->call(FlightsTableSeeder::class);
    }
}
