<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    public function departureAirport()
    {
        return $this->belongsTo('App\Airport', 'departure_airport_id');
    }

    public function port()
    {
        return $this->belongsTo('App\Port');
    }

    public function arrivalAirport()
    {
        return $this->belongsTo('App\Airport', 'arrival_airport_id');
    }
}
