<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Shop;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $param = ['user' => $user];
        return view('index', $param);
    }

    public function check(Request $request)
    {
        $text = ['text' => 'ログインして下さい。'];
        return view('auth', $text);
    }

    public function checkUser(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt([
            'email' => $email,
            'password' => $password
        ])) {
            $text =   Auth::user()->name . 'さんがログインしました';
        } else {
            $text = 'ログインに失敗しました';
        }
        return view('index', ['text' => $text]);
    }
    public function mypage(Request $request)
    {
        $user = Auth::user();
        $items = User::find($user);
        $today = date("Y-m-d H:i:s", strtotime("+1 hours"));
        $user_id = $user->id;
        $query_reservation = Reservation::query();
        $query_reservation->where('user_id', "$user_id")->where('start_at', '>' ,"$today");
        $reservations = $query_reservation->orderBy('start_at', 'asc')->get();
        $param = ['user' => $user, 'items' => $items, 'reservations' => $reservations  ];
        if (Auth::check()) {
            // ログイン済みのときの処理
            return view('mypage', $param);
        } else {
            // ログインしていないときの処理
            $text = ['text' => 'ログインして下さい。'];
            return view('auth', $text);
        }
    }
}
