<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Rent;
use Illuminate\Http\Request;

class RentController extends Controller
{
    //
    public function addRent(Request $request)
    {
        $data = new Rent();

        $requestData = $request->all();
        $rent = $data->create($requestData);

        return response()->json([
            'message' => 'Reserved',
            'info' => $rent
        ]);
    }

    public function editRent(Request $request, $id)
    {
        $data = Rent::find($id);

        $requestData = $request->all();
        $rent = $data->update($requestData);

        return response()->json([
            'message' => 'Reserved',
            'info' => $rent
        ]);
    }

    public function deleteRent($id)
    {
        $data = Rent::where('id', $id)->delete();
        return response()->json([
            'message' => "Deleted"
        ]);
    }

    public function show()
    {
        return Rent::orderBy('id', 'DESC')->get();
    }

    public function status($id)
    {
        $data = Rent::find($id);
        if ($data->status == 0) {
            $data->update(['status', 1]);
            return "Served";
        } else {
            $data->update(['status', 0]);
            return "Waiting";
        }
    }
}
