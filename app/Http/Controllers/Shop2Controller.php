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
        $param = ['items' => $items, 'user' => $user];
        return view('index', $param);

         
    }
    public function detail($id)
    {
        $user = Auth::user();
        $shop = Shop::find($id);
        $param = ['shop' => $shop, 'user' => $user];
        return view('detail',$param);
    }

    public function search(Request $request)
    {
        $area_id = $request->input('area_id');
        $categoly = $request->input('categoly');
        $shop_name = $request->input('shop_name');
        // ジャンルに
        $items = Shop::whereHas('area', function ($query) {
            $query->where('area_id', '$area_id',);
        })->get();


        return view('index', ['items' => $items]);
        
    }
    public function s(Request $request)
    {
        $area_id = $request->input('area_id');
        $categoly = $request->input('categoly');
        $name = $request->input('name');
        // ジャンルに
        $query = Shop::query();
        if (!empty($area_id)) {
            $query->where('area_id', "%{$area_id}%");
        }
        if (!empty($categoly)) {
            $query->where('categoly', 'LIKE', "%{$categoly}%");
        }
        if (!empty($name)) {
            $query->where('name', 'LIKE', "%{$name}%");

            $items = $query->get();
            $user = Auth::user();
            $param = ['items' => $items, 'user' => $user,];

            return view('index', $param);
        }
    }
}