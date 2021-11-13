<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    public function review(ReviewRequest $request)//レビューを投稿　formrequestでバリデーション->$requestへ
    {
        $form = $request->all();//inputを全て取得し$formに代入
        Review::create($form);//クリエイト
        return back();//戻る
    }
    public function review_change(ReviewRequest $request)//レビューを変更　formrequestでバリデーション->$requestへ
    {
        $review = Review::find($request->id);//該当のreviewからidを取得
        $user_id = $request->user_id;//user_idを取得
        $shop_id = $request->shop_id;//shop_idを取得
        $rate = $request->rate;//rateを取得
        $coment = $request->coment;//comentを取得
        $review->shop_id = $shop_id;//各々を$reviewにセットしsave()、戻る
        $review->user_id = $user_id;
        $review->rate = $rate;
        $review->coment = $coment;
        $review->save();
        return back();
    }
}
