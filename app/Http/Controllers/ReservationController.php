<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Reservation;
use Illuminate\Http\Request;
use LDAP\Result;

class ReservationController extends Controller
{
    //
    public function addReservation(Request $request)
    {

        $data = new Reservation();

        $collection = collect($request->dish);

        $data->user_id = Auth::user()->id;
        $data->event_type = $request->event_type;
        $data->event_theme = $request->event_theme;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->amount = $request->amount;
        $data->package = $request->packages;
        $data->dish = $collection->implode(',');

        $data->status = 0;

        $data->save();

        return $this->payment($request->all());
        // return response()->json([
        //     'message' => 'Reserved',
        //     'info' => $data
        // ]);
    }

    public function editReservation(Request $request, $id)
    {
        $data = Reservation::find($id);

        $collection = collect($request->dish);
        $data->event_type = $request->event_type;
        $data->event_theme = $request->event_theme;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->package = $request->package;
        $data->dish = $collection->implode(',');

        $data->save();

        return response()->json([
            'message' => 'Reserved',
            'info' => $data
        ]);
    }

    public function deleteReserve($id)
    {
        $data = Reservation::where('id', $id)->delete();
        return response()->json([
            'message' => "Deleted"
        ]);
    }

    public function show()
    {
        return Reservation::with('users')->orderBy('id', 'DESC')->get();
    }

    public function status($id)
    {
        $data = Reservation::find($id);
        if ($data->status == 0) {
            $data->update(['status', 1]);
            return "Served";
        } else {
            $data->update(['status', 0]);
            return "Waiting";
        }
    }

    public function payment($request)
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
                'x-public-key' => 'pk_a63c3c432c45f68d0607100765d7d768',
                'amount' => $request['amount'],
                'description' => 'Payment for' . $request['packages'],
                'customermobile' => $request['gcash'],
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
}
