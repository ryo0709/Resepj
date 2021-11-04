<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;

class ReviewController extends Controller
{
    public function review(Request $request)
    {
        
        $form = $request->all();
        Review::create($form);

        $user = Auth::user();
        $shop_id = $request->shop_id;
        $shop = Shop::find ($shop_id);
        $query = Review::query();
        $query->where('shop_id',
            "$shop_id"
        );
        $reviews = $query->get();
        $date = null;
        $time = null;
        $datetime = null;
        $num = null;
            $user_id = $user->id;
            $query_reservation = Reservation::query();
            $query_reservation->where('shop_id', "$shop_id")->where('user_id', "$user_id");
            $reservation = $query_reservation->orderBy('start_at', 'asc')->first();
            $user_review_query = Review::query();
            $user_review_query->where('shop_id', "$shop_id")->where('user_id', "$user_id");
            $user_review = $user_review_query->first();
            $param = [
                'shop' => $shop,
                'user' => $user,
                'date' => $date,
                'time' => $time,
                'datetime' => $datetime,
                'num' => $num,
                'reviews' => $reviews,
                'reservation' => $reservation,
                'user_review' => $user_review,
            ];
            return view('detail', $param);
        
    }
    public function review_change(Request $request)
    {
        $review = Review::find($request->id);
        $user_id = $request->user_id;
        $shop_id = $request->shop_id;
        $rate = $request->rate;
        $coment = $request->coment;
        $review->shop_id = $shop_id;
        $review->user_id = $user_id;
        $review->rate = $rate;
        $review->coment = $coment;
        $review->save();


        $user = Auth::user();
        $shop = Shop::find ($shop_id);
        $query = Review::query();
        $query->where('shop_id',
            "$shop_id"
        );
        $reviews = $query->get();
        $date = null;
        $time = null;
        $datetime = null;
        $num = null;
            $user_id = $user->id;
            $query_reservation = Reservation::query();
            $query_reservation->where('shop_id', "$shop_id")->where('user_id', "$user_id");
            $reservation = $query_reservation->orderBy('start_at', 'asc')->first();
            $user_review_query = Review::query();
            $user_review_query->where('shop_id', "$shop_id")->where('user_id', "$user_id");
            $user_review = $user_review_query->first();
            $param = [
                'shop' => $shop,
                'user' => $user,
                'date' => $date,
                'time' => $time,
                'datetime' => $datetime,
                'num' => $num,
                'reviews' => $reviews,
                'reservation' => $reservation,
                'user_review' => $user_review,
            ];
            return view('detail', $param);
        
    }
}
