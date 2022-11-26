<?php

namespace App\Http\Controllers;

use App\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    //
    public function addFood(Request $request)
    {
        $data = new Food();

        $data->name = $request->name;
        $data->type = $request->type;
        $data->price = $request->price;
        if ($request->photo) {
            $image = $request->photo;  // your base64 encoded
            list($type, $image) = explode(';', $image);
            list(, $image)      = explode(',', $image);
            $data2 = base64_decode($image);
            $imageName = date("YmdHis") . '.' . 'jpeg';
            file_put_contents(public_path() . '/' . 'images/food/' . $imageName, $data2);
            $data->photo = $imageName;
        }
        $data->save();
        return response()->json([
            'message' => "Success"
        ]);
    }
    public function editFood(Request $request, $id)
    {
        $data = Food::find($id);

        $data->name = $request->name;
        $data->type = $request->type;
        if ($request->photo) {
            $image = $request->photo;  // your base64 encoded
            list($type, $image) = explode(';', $image);
            list(, $image)      = explode(',', $image);
            $data2 = base64_decode($image);
            $imageName = date("YmdHis") . '.' . 'jpeg';
            file_put_contents(public_path() . '/' . 'images/food/' . $imageName, $data2);
            $data->photo = $imageName;
        }
        $data->save();
        return response()->json([
            'message' => "Success"
        ]);
    }

    public function deleteFood($id)
    {
        $data = Food::where('id', $id)->delete();
        return response()->json([
            "message" => "Delete Success"
        ]);
    }

    public function search()
    {
        $data = Food::where('type', 'Dish')->get();
        return $data;
    }
    public function search2()
    {
        $data = Food::get();
        return $data;
    }
}
