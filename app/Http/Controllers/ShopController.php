<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Reservation;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index(Request $request)//ホーム画面に店舗一覧が表示
    {
        $user = Auth::user();
        //ユーザーを取得　$userに代入
        $shops = Shop::all();
        //ショップ一覧を取得　$shopsに代入
        $select_area_id = null;
        //検索後の値を保持するために変数にnullを代入
        $name =null;
        //検索後の値を保持するために変数にnullを代入

        $param = [
            'user' => $user,
            'shops' => $shops,
            'select_area_id' => $select_area_id,
            'name' => $name
        ];//設定した変数を配列にし、$paramに代入
        return view('index', $param);
    }
    public function detail($id)//店舗詳細が表示　＊$idには詳しく見るボタンを押したshopのidがはいっている
    {
        $user = Auth::user();
        //ユーザーを取得
        $shop = Shop::find($id);
        //詳しく見るボタンを押したshopのidでshopsテーブルから該当店舗を呼び出す
        $query = Review::query();
        //レビューを取得
        $query->where('shop_id', "$id");
        //Reviewsテーブルから該当shopのidを持つレビューを取得
        $reviews = $query->orderBy('updated_at', 'desc')->get();
        //取得したレビューをorderBy()で降順*(最新のレビューが上にくる)にソートし$reviiewsに代入

        if ($user !== null) { //ログインしている場合には予約状況、レビュー状況を参照する為以下の処理が行われる
            $user_id = $user->id;
            //userのidを取得
            $query_reservation = Reservation::query();
            //予約状況を参照する　予約があればレビュー、レビュー更新の権利がある
            $query_reservation->where('shop_id', "$id")->where('user_id', "$user_id");
            //resevationsテーブルからwhere()で該当shop_id、ログインしているuser_idで参照する
            $reservation = $query_reservation->orderBy('start_at', 'asc')->first();
            //取得したresevationを開始時間を基準とし昇順（予約が新しいにソートする
            //レビューをする条件、レビューは1shopにつき1review、start_at（開始時間）より1時間後からとした
            $user_review_query = Review::query();
            //ログインユーザーのレビューを参照する
            $user_review_query->where('shop_id', "$id")->where('user_id', "$user_id");
            //where()でshop_id,user_idで参照
            $user_review = $user_review_query->first();
            //レビューは1reviewにつき1userとしたのでfirst()で取得
            $param = [
                'shop' => $shop,
                'user' => $user,
                'reviews' => $reviews,
                'reservation' => $reservation,
                'user_review' => $user_review,
            ];
            return view('detail', $param);
        } else { //ログインしてない場合
            $reservation = null;
            $user_review = null;
            //参照するresevation、reviewがないので各々にnullを代入
            $param = [
                'shop' => $shop,
                'user' => $user,
                'reviews' => $reviews,
                'reservation' => $reservation,
                'user_review' => $user_review,
            ];
            return view('detail', $param);
        }
    }

    public function area_search(Request $request)//エリアで検索
    {
        $area_id = $request->area_id;//inputにいれたarea_idを$area_idにセット
        $select_area_id = $area_id;//inputに入力したareaを保持するために$select_area_idにセット
        $name = null;
        if ($area_id === "0") {
            return back();
            //エリア検索でAllareaが選択された時は初期画面がひょうじされる
        } else {
            $query = Shop::query();
            $query->where('area_id', "$area_id");
            $shops = $query->get();
            //入力されたarea_idからshopを参照する。複数取得になるのでget()で取得
            $user = Auth::user();
            $param = [
                'shops' => $shops,
                'user' => $user,
                'select_area_id' => $select_area_id,
                'name' => $name
            ];
            return view('index', $param);
        }
    }

    public function name_search(Request $request)//shop名で検索
    {
        $name = $request->name;//文字列を取得
        $select_area_id = null;
        $query = Shop::query();
        $query->where('name', 'LIKE', "%{$name}%");
        $shops = $query->get();
        //whereの引数にLIKE,%{}%を用いshopのnameを対象とし、取得した文字列が含まれるかを参照。複数の可能性があるためget()とした
        $user = Auth::user();
        $param = [
            'shops' => $shops,
            'user' => $user,
            'select_area_id' => $select_area_id,
            'name' => $name
        ];
        return view('index', $param);
    }
}
