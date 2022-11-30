<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tray extends Model
{
    //
    protected $fillable = [
        'amount', 'status'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'name');
    }
}
