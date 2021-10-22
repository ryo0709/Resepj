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

    public function area_search(Request $request)
    {
        $area_id = $request->area_id;
        $query = Shop::query();
        $query->where('area_id',"$area_id");
        $items = $query->get();
        $user = Auth::user();
        $param = ['items' => $items, 'user' => $user,];
        return view('index', $param);
    }
    public function genre_search(Request $request)
    {
        $genre_id = $request->genre_id;
        $query = Shop::query();
        $query->where('genre_id',"$genre_id");
        $items = $query->get();
        $user = Auth::user();
        $param = ['items' => $items, 'user' => $user,];
        return view('index', $param);
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