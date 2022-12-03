<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    //
    protected $fillable = [
        'user_id', 'supply_name', 'price', 'quantity', 'total', 'status', 'is_paid'
    ];
    protected $casts = [
        'created_at'  => 'date:m-d-Y',
        'updated_at' => 'datetime:Y-m-d',
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // public function getStatusAttribute($value)
    // {
    //     switch ($value) {
    //         case 0:
    //             return 'Pending';
    //             break;
    //         case 1:
    //             return 'Approved';
    //             break;
    //     }
    // }
}
