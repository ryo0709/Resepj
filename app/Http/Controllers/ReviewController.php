<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    public function review(ReviewRequest $request)
    {
        
        $form = $request->all();
        Review::create($form);

        // $user = Auth::user();
        // $shop_id = $request->shop_id;
        // $shop = Shop::find ($shop_id);
        // $query = Review::query();
        // $query->where('shop_id',
        //     "$shop_id"
        // );
        // $reviews = $query->get();
        //     $user_id = $user->id;
        //     $query_reservation = Reservation::query();
        //     $query_reservation->where('shop_id', "$shop_id")->where('user_id', "$user_id");
        //     $reservation = $query_reservation->orderBy('start_at', 'asc')->first();
        //     $user_review_query = Review::query();
        //     $user_review_query->where('shop_id', "$shop_id")->where('user_id', "$user_id");
        //     $user_review = $user_review_query->first();
        //     $param = [
        //         'shop' => $shop,
        //         'user' => $user,
        //         'reviews' => $reviews,
        //         'reservation' => $reservation,
        //         'user_review' => $user_review,
        //     ];
            return back();
    }
    public function review_change(ReviewRequest $request)
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
        return back();
    }
}
