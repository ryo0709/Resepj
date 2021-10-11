<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'shop_id', 'reservation_date', 'reservation_time', 'number',];

    public function getReserve() {
        return 'ID' . $this->id . ':' . $this-> num_of_users . optional($this->shop)->name;
    }
    public function getShopName() {
        return optional($this->shop)->name;
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }
}
