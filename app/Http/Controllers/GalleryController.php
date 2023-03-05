<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    //

    public function addPicture(Request $request)
    {
        $data = new Gallery();

        $image = $request->photo;
        list($type, $image) = explode(';', $image);
        list(, $image) = explode(',', $image);
        $data2 = base64_decode($image);
        $imageName = date("YmdHis") . '.' . 'jpeg';
        file_put_contents(public_path() . '/' . 'images/gallery/' . $imageName, $data2);
        $data->photo = $imageName;
        $data->save();
        return response()->json([
            'message' => "Success"
        ]);
    }

    public function show()
    {
        return Gallery::get();
    }

    public function deletePicture($id)
    {
        $data = Gallery::where('id', $id)->delete();
        return response()->json([
            'message' => 'Success'
        ]);
    }

    public function getGalleries()
    {
        return Gallery::get();
    }
}
