<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;

class CartController extends Controller
{
    //

    public function getCart()
    {
        $data = Cart::where('user_id', Auth::user()->id)->get();
        return $data;
    }

    public function deleteData($id)
    {
        return Cart::where('id', $id)->delete();
    }

    public function deleteAllCart()
    {
        return Cart::where('user_id', Auth::user()->id)->delete();
    }
}
