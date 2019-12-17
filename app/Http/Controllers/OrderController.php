<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Flight;
use App\Order;

class OrderController extends Controller
{
    public function changePage($id)
    {
        $flight = Flight::find($id);
        return view('order.change', ['order' => Order::find($id), 'flights' => Flight::where('id', '!=', $flight->id)->whereHas('departureAirport', function (Builder $query) use ($flight) {
            $query->where('city', $flight->departureAirport->city);
        })->whereHas('arrivalAirport', function (Builder $query) use ($flight) {
            $query->where('city', $flight->arrivalAirport->city);
        })->get()]);
    }

    public function change(Request $request, $id)
    {
        $order = Order::find($id);
        $order->flight_id = $request->flight_id;
        $order->save();

        return view('order.changeResult');
    }

    public function refundPage($id)
    {
        $order = Order::find($id);
        return view('order.refund', ['order' => $order]);
    }

    public function refund(Request $request, $id)
    {
        Order::find($id)->delete();
        return view('order.refundResult');
    }
}
