<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reservation(ReservationRequest $request)//予約機能　formrequestでバリデーション->$requestへ
    {
        $user_id = $request->user_id;//ログインしているuserからidを取得
        $shop_id = $request->shop_id;//該当shopのidを取得
        $date = $request->date;//inputからdateを取得
        $time = $request->time;//inputからtimeを取得
        $datetime = $date . "T" . $time;
        //start_atの型がdatetimeなので、コントローラー内で$date、"T"（datetime型にするため）、$timeを結合、
        $num_of_users = $request->num_of_users;
        //各々を$reservationにセット
        $reservation = new Reservation;
        $reservation->shop_id = $shop_id;
        $reservation->user_id = $user_id;
        $reservation->start_at = $datetime;
        //$reservation->start_at = $date . "T" . $time;と上記省略可能であるが、型を直した過程を残すため省略はしなかった　
        $reservation->num_of_users = $num_of_users;
        $reservation->save();
        return redirect('/done');//予約完了画面へ
    }
    public function reservation_change(ReservationRequest $request)//予約変更機能　formrequestでバリデーション->$requestへ
    {

        $reservation = Reservation::find($request->id);//上記とほぼ同じなので省略
        $date = $request->date;
        $time = $request->time;
        $start_at = $date . "T" . $time;
        $num_of_users = $request->num_of_users;
        $user_id = $request->user_id;
        $shop_id = $request->shop_id;
        $reservation->shop_id = $shop_id;
        $reservation->user_id = $user_id;
        $reservation->start_at = $start_at;
        $reservation->num_of_users = $num_of_users;
        $reservation->save();
        return redirect('/done');
    }
    public function delete($id)//予約削除機能
    {
        Reservation::find($id)->delete();
        return redirect('/mypage');
    }
}
