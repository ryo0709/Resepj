<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Reservation;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function mypage(Request $request)
    {
        $user = Auth::user();//ユーザーを取得
        $items = User::find($user);
        $today = date("Y-m-d H:i:s", strtotime("+1 hours"));//本日の日付を$todayに代入
        $user_id = $user->id;
        $query_reservation = Reservation::query();//user_idでreservationsを参照して予約情報を取得
        $query_reservation->where('user_id', "$user_id")->where('start_at', '>', "$today");//本日以降のreservationのみ取得
        $reservations = $query_reservation->orderBy('start_at', 'asc')->get();//予約日が近い順にソートし、複数なのでget()
        $param = ['user' => $user, 'items' => $items, 'reservations' => $reservations];
        return view('mypage', $param);
    }
}
