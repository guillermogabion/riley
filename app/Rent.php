<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    //
    protected $fillable = [
        'user_id', 'supply_name', 'price', 'quantity', 'total', 'status', 'is_paid'
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
