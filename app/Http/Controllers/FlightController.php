<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Flight;

class FlightController extends Controller
{
    public function result(Request $request)
    {
        $flights = new Flight;
        if ($request->type == 0) {
            if ($request->city1 != '') {
                $flights = $flights->whereHas('departureAirport', function (Builder $query) use ($request) {
                    $query->where('city', $request->city1);
                });
            }
            if ($request->city2 != '') {
                $flights = $flights->whereHas('arrivalAirport', function (Builder $query) use ($request) {
                    $query->where('city', $request->city2);
                });
            }
        } else {
            $flights = $flights->where('flight_number', $request->flight_number);
        }

        return view('flight.result', ['flights' => $flights->get()]);
    }
}
