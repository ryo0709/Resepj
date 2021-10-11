<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function shop()
    {
        return $this->hasOne('App\Models\Shop');
    }
    public function shops()
    {
        return $this->hasMany('App\Models\Shop');
    }
    // public function getCategory()
    // {
    //     return 'ID' . $this->id . ':' . $this->category;
    // }
}
