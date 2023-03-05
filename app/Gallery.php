<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //

    public function getPhotoAttribute($value)
    {
        return asset('images/gallery') . '/' . $value;
    }
}
