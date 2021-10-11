<?php

namespace App\Http\Controllers;

use App\Models\Reserve;
use Illuminate\Http\Request;

class ReserveController extends Controller
{
    public function reserve(Request $request)
    {
        $form = $request->all();
        Reserve::create($form);
        return redirect('/done');
    }

    public function liked($shop_id, $user_id)
    {
        Like::create([
            'shop_id' => $shop_id,
            'user_id' => $user_id,
        ]);
        return redirect('/');
    }
}
