<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function reservation(Request $request)
    {
        $validate_rule = [
            'user_id' => 'required',
            'shop_id' => 'required',
            'date' => 'required',
            'time' => 'required',
            'num' => 'required',
        ];
        $this->validate($request, $validate_rule);

        $user_id = $request->user_id;
        $shop_id = $request->shop_id;
        $date = $request->date;
        $time = $request->time;
        $datetime = $date . "T" . $time;
        $num = $request->num;
        $reservation = new Reservation;
        $reservation->shop_id = $shop_id;
        $reservation->user_id = $user_id;
        $reservation->start_at = $datetime;
        $reservation->num_of_users = $num;
        $reservation->save();
        return redirect('/done');
    }
    public function delete($id)
    {
        Reservation::find($id)->delete();
        return redirect('/mypage');
    }
}
