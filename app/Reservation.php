<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $casts = [
        'created_at'  => 'date:m-d-Y',
        'updated_at' => 'datetime:Y-m-d',
    ];

    protected $fillable = [
        'status'
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
