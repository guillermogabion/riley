<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tray extends Model
{
    //
    protected $fillable = [
        'amount', 'status'
    ];
    protected $casts = [
        'created_at'  => 'date:m-d-Y',
        'updated_at' => 'datetime:Y-m-d',
    ];


    public function users()
    {
        return $this->belongsTo(User::class, 'name');
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
