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
        return Rent::where('is_paid', 1)->with('users')->orderBy('id', 'DESC')->get();
    }

    public function getAllSupply()
    {
        return Rent::get();
    }

    public function status($id)
    {
        $data = Rent::find($id);
        if ($data->status == 0) {
            $data->update(['status' => 1]);
            return "Served";
        } else {
            $data->update(['status' => 0]);
            return "Waiting";
        }
    }

    public function checkOut(Request $request)
    {
        $data = new Rent();

        $data->user = $request->user;
        $data->contact = $request->contact;
        $data->supply_name = $request->supply_name;
        // $data->price = $request->price;
        $data->quantity = $request->quantity;
        // $data->total = $request->total;
        // $data->start = $request->start;
        $data->save();

        return $data;
    }

    public function getmyCheckout()
    {
        $data = Rent::where('is_paid', 0)->get();
        return $data;
    }

    public function updateIspaid()
    {

        $data = Rent::where('user_id', Auth::user()->id)->update([
            'is_paid' => 1
        ]);

        return $data;
    }

    public function deleteUnPaid()
    {
        return Rent::where('user_id', Auth::user()->id)->delete();
    }

    public function payment(Request $request)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://g.payx.ph/payment_request',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                // 'x-public-key' => 'pk_a63c3c432c45f68d0607100765d7d768',
                'x-public-key' => 'pk_aa53096ced53364e971b490ef210320c',
                'amount' => $request->text,
                'description' => 'Payment for Equipments/Supplies',
                'customermobile' => Auth::user()->contact,
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
}
