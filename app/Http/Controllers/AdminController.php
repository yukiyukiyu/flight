<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Airport;
use App\Flight;
use App\Admin;
use App\Passenger;
use App\Port;
use App\Announcement;

class AdminController extends Controller
{
    public function usersPage()
    {
        return view('admin.users', ['users' => User::all()]);
    }

    public function userPage($id)
    {
        $user = User::find($id);
        if ($id == 0) {
            $user = new User;
            $user->id = 0;
        }

        $passenger = Passenger::where('user_id', $id)->first();
        if (!is_object($passenger)) {
            $passenger = new Passenger;
        }

        return view('admin.user', ['user' => $user, 'passenger' => $passenger]);
    }

    public function userUpdate(Request $request, $id)
    {
        Admin::where('user_id', $id)->delete();
        Passenger::where('user_id', $id)->delete();

        $user = User::find($id);
        if ($id == 0) {
            $user = new User;
        }

        if ($request->password != '') {
            $user->password = Hash::make($request->password);
        }
        $user->username = $request->username;
        $user->role = $request->role;
        $user->save();

        if ($user->role == 0) {
            $admin = new Admin;
            $admin->user_id = $user->id;
            $admin->save();
        } else {
            $passenger = new Passenger;
            $passenger->user_id = $user->id;
            $passenger->name = $request->name;
            $passenger->id_number = $request->id_number;
            $passenger->save();
        }

        return redirect('/admin/user/' . $user->id);
    }

    public function airportsPage()
    {
        return view('admin.airports', ['airports' => Airport::all()]);
    }

    public function airportPage($id)
    {
        $airport = Airport::find($id);
        if ($id == 0) {
            $airport = new Airport;
            $airport->id = 0;
        }

        return view('admin.airport', ['airport' => $airport]);
    }

    public function airportUpdate(Request $request, $id)
    {
        $airport = Airport::find($id);
        if ($id == 0) {
            $airport = new Airport;
        }

        $airport->name = $request->name;
        $airport->city = $request->city;
        $airport->save();

        return redirect('/admin/airport/' . $airport->id);
    }

    public function flightsPage()
    {
        return view('admin.flights', ['flights' => Flight::all()]);
    }

    public function flightPage($id)
    {
        $flight = Flight::find($id);
        if ($id == 0) {
            $flight = new Flight;
            $flight->id = 0;
        }

        $airports = Airport::all();
        if (!is_object($airports)) {
            $airports = new Airport;
        }

        return view('admin.flight', ['flight' => $flight, 'airports' => $airports]);
    }

    public function flightUpdate(Request $request, $id)
    {
        $flight = Flight::find($id);
        if ($id == 0) {
            $flight = new Flight;
        }

        $flight->flight_number = $request->flight_number;
        $flight->price = $request->price;
        $flight->capacity = $request->capacity;
        $flight->departure_airport_id = $request->departure_airport_id;
        $flight->departure_time = $request->departure_time;
        $flight->expected_delay = $request->expected_delay;
        $flight->arrival_airport_id = $request->arrival_airport_id;
        $flight->expected_arrival_time = $request->expected_arrival_time;
        $flight->expected_arrival_delay = $request->expected_arrival_delay;
        $flight->save();

        return redirect('/admin/flight/' . $flight->id);
    }

    public function announcementsPage()
    {
        return view('admin.announcements', ['announcements' => Announcement::all()]);
    }


    public function announcementPage($id)
    {
        $announcement = Announcement::find($id);
        if ($id == 0) {
            $announcement = new Announcement;
            $announcement->id = 0;
        }

        return view('admin.announcement', ['announcement' => $announcement]);
    }

    public function announcementUpdate(Request $request, $id)
    {
        $announcement = Announcement::find($id);
        if ($id == 0) {
            $announcement = new Announcement;
        }

        $announcement->title = $request->title;
        $announcement->content = $request->content;
        $announcement->save();

        return redirect('/admin/announcement/' . $announcement->id);
    }
}
