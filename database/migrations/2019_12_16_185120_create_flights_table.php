<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
}
