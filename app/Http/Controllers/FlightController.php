<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Flight;
use App\Order;

class FlightController extends Controller
{
    public function result(Request $request)
    {
        $flights = new Flight;
        $flights = $flights->whereHas('departureAirport', function (Builder $query) use ($request) {
            $query->where('city', 'LIKE', '%'.$request->city1.'%');
        });
        $flights = $flights->whereHas('arrivalAirport', function (Builder $query) use ($request) {
            $query->where('city', 'LIKE', '%'.$request->city2.'%');
        });
        $flights = $flights->where('flight_number', 'LIKE', '%'.$request->flight_number.'%');
        $flights = $flights->whereDate('departure_time', $request->departure_date);

        return view('flight.result', ['flights' => $flights->get()]);
    }

    public function detail($id)
    {
        return view('flight.detail', ['flight' => Flight::find($id)]);
    }

    public function buyPage($id)
    {
        return view('flight.buy', ['flight' => Flight::find($id)]);
    }

    public function buy(Request $request, $id)
    {
        $order = new Order;
        $order->user_id = $request->session()->get('user_id');
        $order->flight_id = $id;
        $order->save();

        return view('flight.buyResult');
    }
}
