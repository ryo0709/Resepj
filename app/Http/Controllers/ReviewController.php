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
