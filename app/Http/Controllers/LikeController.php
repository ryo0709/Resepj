<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function liked(Request $request)//お気に入り追加、削除機能
    {
        $user_id = $request->user_id; //1.ログインユーザーのid取得
        $shop_id = $request->shop_id; //2.shop_idの取得
        $already_liked = Like::where('user_id', $user_id)->where('shop_id', $shop_id)->first();
        if (!$already_liked) { //もしこのユーザーがまだお気に入り登録してなかったら以下の処理

        $like = new Like; //4.Likeクラスのインスタンスを作成
        $like->shop_id = $shop_id; //Likeインスタンスに各々をセット
        $like->user_id = $user_id;
        $like->save();
        
        } else { //もしこのユーザーが既にお気に入り登録していたらdelete
            Like::where('shop_id', $shop_id)->where('user_id', $user_id)->delete();
        }
    }
}
