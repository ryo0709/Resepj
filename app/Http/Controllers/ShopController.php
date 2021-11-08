<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Area;
use App\Models\Reservation;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index(Request $request)
    {

        $user = Auth::user();
        $items = Shop::all();
        $shops = Shop::all();
        $param = ['items' => $items, 'user' => $user, 'shops' => $shops];
        return view('index', $param);
    }
    public function detail($id)
    {
        $user = Auth::user();
        $shop = Shop::find($id);
        $query = Review::query();
        $shop_id = $shop->id;
        $query->where('shop_id', "$shop_id");
        $reviews = $query->orderBy('updated_at', 'desc')->get();

        if($user !== null) {//ログインしている
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
            'reviews' => $reviews,
            'reservation' => $reservation,
            'user_review' => $user_review,
        ];
        return view('detail', $param);
    } else { //ログインしてない
            $reservation =null;
            $user_review =null;
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
    public function change_detail($id)
    {
        $user = Auth::user();
        $shop = Shop::find($id);
        $user_id = $user -> id;
        $shop_id = $shop -> id;
        $query_reservation = Reservation::query();
        $query_reservation->where('shop_id', "$shop_id")->where('user_id', "$user_id");
        $reservation = $query_reservation->get();
        $param = [
            'shop' => $shop,
            'user' => $user,
            'reservation' => $reservation
        ];
        return view('detail', $param);
    }

    public function area_search(Request $request)
    {
        $area_id = $request->area_id;
        if ($area_id === "0") {
            $user = Auth::user();
            $items = Shop::all();
            $shops = Shop::all();
            $param = ['items' => $items, 'user' => $user, 'shops' => $shops];
            return view('index', $param);
        } else {
            $query = Shop::query();
            $query->where('area_id', "$area_id");
            $items = $query->get();
            $user = Auth::user();
            $param = ['items' => $items, 'user' => $user,];
            return view('index', $param);
        }
    }
    public function genre_search(Request $request)
    {
        $genre_id = $request->genre_id;
        if ($genre_id === "0") {
            $items = Shop::all();
            $user = Auth::user();
            $param = ['items' => $items, 'user' => $user,];
            return view('index', $param);
        } else {
            $query = Shop::query();
            $query->where('genre_id', "$genre_id");
            $items = $query->get();
            $user = Auth::user();
            $param = ['items' => $items, 'user' => $user,];
            return view('index', $param);
        }
    }
    public function name_search(Request $request)
    {
        $name = $request->name;
        $query = Shop::query();
        $query->where('name', 'LIKE', "%{$name}%");
        $items = $query->get();
        $user = Auth::user();
        $param = ['items' => $items, 'user' => $user,];
        return view('index', $param);
    }
}
