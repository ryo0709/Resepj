<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function liked(Request $request)
    {
        $user_id = $request->user_id; //1.ログインユーザーのid取得
        $shop_id = $request->shop_id; //2.投稿idの取得
        $already_liked = Like::where('user_id', $user_id)->where('shop_id', $shop_id)->first();
        if (!$already_liked) { //もしこのユーザーがこの投稿にまだいいねしてなかったら
        $like = new Like; //4.Likeクラスのインスタンスを作成
        $like->shop_id = $shop_id; //Likeインスタンスにreview_id,user_idをセット
        $like->user_id = $user_id;
        $like->save();
        } else { //もしこのユーザーがこの投稿に既にいいねしてたらdelete
            Like::where('shop_id', $shop_id)->where('user_id', $user_id)->delete();
        }
    }
    public function unlike(Request $request)
    {
        $user_id = $request->user_id; //1.ログインユーザーのid取得
        $shop_id = $request->shop_id; //2.投稿idの取得
        Like::where('shop_id', $shop_id)->where('user_id', $user_id)->delete();
        return redirect('/mypage');
    }
}
