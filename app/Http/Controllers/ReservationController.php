<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reservation(ReservationRequest $request)
    {
        $user_id = $request->user_id;
        $shop_id = $request->shop_id;
        $date = $request->date;
        $time = $request->time;
        $datetime = $date . "T" . $time;
        $num_of_users = $request->num_of_users;
        $reservation = new Reservation;
        $reservation->shop_id = $shop_id;
        $reservation->user_id = $user_id;
        $reservation->start_at = $datetime;
        $reservation->num_of_users = $num_of_users;
        $reservation->save();
        return redirect('/done');
    }
    public function reservation_change(Request $request)
    {
        $validate_rule = [
            'user_id' => 'required',
            'shop_id' => 'required',
            'date' => 'required',
            'time' => 'required',
            'num_of_users' => 'required',
        ];
        $this->validate($request, $validate_rule);

        $reservation = Reservation::find($request->id);
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
    public function delete($id)
    {
        Reservation::find($id)->delete();
        return redirect('/mypage');
    }
}
