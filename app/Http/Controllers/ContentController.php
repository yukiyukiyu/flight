<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flight;
use App\Announcement;
use App\Order;

class ContentController extends Controller
{
    public function index(Request $request)
    {
        return view(
            'index',
            ['flights' => Flight::where('departure_time', '>=', now())->get(),
         'announcements' => Announcement::all(),
          'orders' => Order::where('user_id', $request->session()->get('user_id'))->get()]
        );
    }
}
