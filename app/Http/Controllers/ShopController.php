<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Area;
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

        $date = null;
        $time = null;
        $num = null;

        $param = [
            'shop' => $shop,
            'user' => $user,
            'date' => $date,
            'time' => $time,
            'num' => $num,
            ];
        return view('detail',$param);
    }

    public function search(Request $request)
    {
        $area_id = $request->input('area_id');
        $genre_id = $request->input('genre_id');
        $name = $request->input('name');
        // ジャンルに
        $query = Shop::query();
        if (!empty($area_id)) {
            $query->where('area_id',"$area_id");
        }
        if (!empty($genre_id)) {
            $query->where('genre_id',"{$genre_id}");
        }
        if (!empty($name)) {
            $query->where('name', 'LIKE', "%{$name}%");
        }
        $items = $query->get();
        $user = Auth::user();
        $param = ['items' => $items, 'user' => $user,];

        return view('index', $param);
    }
    public function find(Request $request) {
        $items = Shop::find($request->area_id)->get();
        $user = Auth::user();
        $param = [
            'user' => $user,
            'items' => $items
        ];
        return view('index', $param);
    }
}