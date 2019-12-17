<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('password');
            $table->integer('role');
            $table->timestamps();
        });

        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->timestamps();
        });

        Schema::create('passengers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('name');
            $table->string('id_number');
            $table->timestamps();
        });

        Schema::create('airports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('city');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('ports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('airport_id');
            $table->string('name');
            $table->string('position');
            $table->timestamps();
        });

        Schema::create('flights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('flight_number');
            $table->integer('price');
            $table->integer('capacity');
            $table->integer('departure_airport_id');
            $table->integer('port_id');
            $table->datetime('departure_time');
            $table->time('expected_delay');
            $table->integer('arrival_airport_id');
            $table->datetime('expected_arrival_time');
            $table->time('expected_arrival_delay');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('flight_id');
            $table->timestamps();
        });

        Schema::create('announcements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('admins');
        Schema::dropIfExists('passengers');
        Schema::dropIfExists('airports');
        Schema::dropIfExists('ports');
        Schema::dropIfExists('flights');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('announcements');
    }
}
