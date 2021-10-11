<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    public function relation(Request $request)
    {
        $items = Area::all();
        return view('home', ['items' => $items]);
    }
}
