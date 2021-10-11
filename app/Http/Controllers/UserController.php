<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Reserve;
use App\Models\User;
use App\Models\Shop;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $param = ['user' => $user];
        return view('index', $param);
    }

    public function check(Request $request)
    {
        $text = ['text' => 'ログインして下さい。'];
        return view('auth', $text);
    }

    public function checkUser(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt([
            'email' => $email,
            'password' => $password
        ])) {
            $text =   Auth::user()->name . 'さんがログインしました';
        } else {
            $text = 'ログインに失敗しました';
        }
        return view('index', ['text' => $text]);
    }
    public function mypage(Request $request)
    {

        $user = Auth::user();
        
        $items = User::find($user);
        $param = ['user' => $user, 'items' => $items,  ];

        if (Auth::check()) {
            // ログイン済みのときの処理
            return view('mypage', $param);
        } else {
            // ログインしていないときの処理
            $text = ['text' => 'ログインして下さい。'];
            return view('auth', $text);
        }
    }
}
