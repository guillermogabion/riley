<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model

{
    protected $fillable = [
        'name', 'photo', 'price', 'type', 'status'
    ];
    //

    public function getPhotoAttribute($value)
    {
        return asset('images/food') . '/' . $value;
    }
}
