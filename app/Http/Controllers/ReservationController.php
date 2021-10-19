<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function confirm(Request $request,$id )
    {
        $date = $request->date;
        $time = $request->time;
        $num = $request->num;
        $shop = Shop::find($id);
        $user = Auth::user();
        $param = [
            'shop' => $shop,
            'user' => $user,
            'date' => $date,
            'time' => $time,
            'num' => $num,
        ];
        return view('detail',$param);
    }
    public function reservation(Request $request)
    {
        $form = $request->all();
        Reservation::create($form);
        return redirect('/done');
    }
    public function delete($id)
    {
        Reservation::find($id)->delete();
        return redirect('/mypage');
    }
}
