<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supply;

class SupplyController extends Controller
{
    //

    public function getAllSupply()
    {
        return Supply::orderBy('id', 'DESC')->get();
    }

    public function addSupply(Request $request)
    {
        $data = new Supply();

        $requestData = $request->all();
        $supply = $data->create($requestData);

        return response()->json([
            'message' => 'Saved',
            'info' => $supply
        ]);
    }
    public function editSupply(Request $request, $id)
    {
        $data = Supply::find($id);

        $requestData = $request->all();
        $supply = $data->update($requestData);

        return response()->json([
            'message' => 'Updated',
            'info' => $supply
        ]);
    }
    public function deleteSupply($id)
    {
        return Supply::where('id', $id)->delete();
    }
}
