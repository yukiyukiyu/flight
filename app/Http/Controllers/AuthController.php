<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Passenger;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        if ($request->password != $request->password_confirm) {
            return view('layouts.error', ['message' => '密码与确认密码不一致！']);
        }

        if (User::where('username', $request->username)->count() > 0) {
            return view('layouts.error', ['message' => '用户名已被占用！']);
        }

        $user = new User;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = 1;
        $user->save();

        $passenger = new Passenger;
        $passenger->user_id = $user->id;
        $passenger->name = '姓名';
        $passenger->id_number = '10000020190101000X';
        $passenger->save();

        $request->session()->put('user_id', $user->id);

        return redirect('/personal');
    }

    public function login(Request $request)
    {
        $users = User::where('username', $request->username);
        if ($users->count() == 0) {
            return view('layouts.error', ['message' => '用户不存在！']);
        }

        $user = $users->first();

        if (!Hash::check($request->password, $user->password)) {
            return view('layouts.error', ['message' => '密码错误！']);
        }

        $request->session()->put('user_id', $user->id);

        return redirect('/');
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['user_id', 'user_role', 'username']);

        return redirect('/');
    }
}
