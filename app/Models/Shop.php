<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use App\Models\Auth;

class Shop extends Model
{
    use HasFactory;

    public function getShop()
    {
        return 'ID' . $this->id . ':' . $this->name;
    }
    public function getArea()
    {
        return '#' . optional($this->area)->name;
    }
    public function getGenre()
    {
        return '#' . optional($this->genre)->name;
    }
    public function area()
    {
        return $this->belongsTo('App\Models\Area');
    }
    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }
    public function reserves()
    {
        return $this->hasMany('App\Models\Reserve');
    }
    public function likes()
    {
        return $this->hasMany('App\Models\Like','shop_id');
    }
    public function isLikedBy($user): bool
    {
        return Like::where('user_id', $user->id)->where('shop_id', $this->id)->first() !== null;
    }
}
