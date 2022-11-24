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

        $data->user_id = Auth::user()->id;
        $data->event_type = $request->event_type;
        $data->event_theme = $request->event_theme;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->package = $request->package;
        $data->dish = $request->dish;
        $data->status = 0;

        $data->save();

        return response()->json([
            'message' => 'Reserved',
            'info' => $data
        ]);
    }

    public function editReservation(Request $request, $id)
    {
        $data = Reservation::find($id);

        $data->event_type = $request->event_type;
        $data->event_theme = $request->event_theme;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->package = $request->package;
        $data->dish = $request->dish;

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
        return Reservation::orderBy('id', 'DESC')->get();
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
}
