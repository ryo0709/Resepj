<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function relation(Request $request)
    {
        $items = Category::all();
        return view('home', ['items' => $items]);
    }
}
