<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Passenger;

class UserController extends Controller
{
    public function personalPage(Request $request)
    {
        $passenger = Passenger::where('user_id', $request->session()->get('user_id'))->first();
        return view('user.personal', ['passenger' => $passenger]);
    }

    public function personalUpdate(Request $request)
    {
        if ($request->password != $request->password_confirm) {
            echo '密码与确认密码不一致！';
            return;
        }

        $users = User::find($request->session()->get('user_id'));

        $user = $users->first();

        if (!Hash::check($request->password_old, $user->password)) {
            echo '密码不正确！';
            return;
        }

        if ($request->password != "") {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        $passenger = Passenger::where('user_id', $request->session()->get('user_id'))->first();
        $passenger->name = $request->name;
        $passenger->id_number = $request->id_number;
        $passenger->save();

        return redirect('/personal');
    }
}
