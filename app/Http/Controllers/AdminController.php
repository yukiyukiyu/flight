<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Airport;
use App\Flight;
use App\Admin;
use App\Passenger;
use App\Port;

class AdminController extends Controller
{
    public function usersPage()
    {
        return view('admin.users', ['users' => User::all()]);
    }

    public function userPage($id)
    {
        return view('admin.user', ['user' => User::find($id), 'passenger' => Passenger::where('user_id', $id)->first()]);
    }

    public function userUpdate(Request $request, $id)
    {
        Admin::where('user_id', $id)->delete();
        Passenger::where('user_id', $id)->delete();

        $user = User::find($id);
        if ($request->password != '') {
            $user->password=Hash::make($request->password);
        }
        $user->role=$request->role;
        $user->save();

        if ($user->role==0) {
            $admin=new Admin;
            $admin->user_id = $user->id;
            $admin->save();
        } else {
            $passenger = new Passenger;
            $passenger->user_id = $user->id;
            $passenger->name=$request->name;
            $passenger->id_number=$request->id_number;
            $passenger->save();
        }

        return redirect('/admin/user/'.$id);
    }

    public function userAdd(Request $request)
    {
    }

    public function airportsPage()
    {
        return view('admin.airports', ['airports' => Airport::all()]);
    }

    public function airportPage($id)
    {
        return view('admin.airport', ['airport' => Airport::find($id)]);
    }

    public function airportUpdate(Request $request, $id)
    {
        $airport = Airport::find($id);
        $airport->name=$request->name;
        $airport->city=$request->city;
        $airport->save();

        return redirect('/admin/airport/'.$id);
    }

    public function airportAdd(Request $request)
    {
    }

    public function flightsPage()
    {
        return view('admin.flights', ['flights' => Flight::all()]);
    }

    public function flightPage($id)
    {
        return view('admin.flight', ['flight' => Flight::find($id), 'airports' => Airport::all(), 'ports' => Port::all()]);
    }

    public function flightUpdate(Request $request, $id)
    {
        $flight = flight::find($id);
        $flight->flight_number=$request->flight_number;
        $flight->price=$request->price;
        $flight->capacity=$request->capacity;
        $flight->departure_airport_id=$request->departure_airport_id;
        $flight->port_id=$request->port_id;
        $flight->departure_time=$request->departure_time;
        $flight->expected_delay=$request->expected_delay;
        $flight->arrival_airport_id=$request->arrival_airport_id;
        $flight->expected_arrival_time=$request->expected_arrival_time;
        $flight->expected_arrival_delay=$request->expected_arrival_delay;
        $flight->save();

        return redirect('/admin/flight/'.$id);
    }

    public function flightAdd(Request $request)
    {
    }
}
