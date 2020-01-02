<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Passenger;
use App\Order;

class UserController extends Controller
{
    public function personalPage(Request $request)
    {
        return view(
            'user.personal',
            [
                'passenger' => Passenger::where('user_id', $request->session()->get('user_id'))->first()
            ]
        );
    }

    public function ordersPage(Request $request)
    {
        return view(
            'user.orders',
            [
                'passenger' => Passenger::where('user_id', $request->session()->get('user_id'))->first(),
                'orders' => Order::where('user_id', $request->session()->get('user_id'))->get()
            ]
        );
    }

    public function personalUpdate(Request $request)
    {
        if ($request->password != $request->password_confirm) {
            return view('layouts.error', ['message' => '密码与确认密码不一致！']);
        }

        $user = User::find($request->session()->get('user_id'));

        if (!Hash::check($request->password_old, $user->password)) {
            return view('layouts.error', ['message' => '密码错误！']);
        }

        if ($request->name == '') {
            return view('layouts.error', ['message' => '姓名不能为空！']);
        }

        if ($request->id_number == '') {
            return view('layouts.error', ['message' => '身份证号不能为空！']);
        }

        if ($request->password != '') {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        $passenger = Passenger::where('user_id', $request->session()->get('user_id'))->first();
        $passenger->name = $request->name;
        $passenger->id_number = $request->id_number;
        $passenger->save();

        $request->session()->put('username', $passenger->name);

        return redirect('/personal');
    }
}
