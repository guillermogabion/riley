<?php

namespace App\Http\Controllers;

use App\Food;
use App\Tray;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrayController extends Controller
{
    //
    public function addTray(Request $request)
    {
        $data = new Tray();

        $data->name = Auth::user()->id;
        $data->order = $request->order;
        $data->quantity = $request->quantity;
        $data->total = $request->total;
        $data->price = $request->pricetray;
        $data->save();


        // return response()->json([
        //     'message' => 'Ordered',
        //     'info' => $rent
        // ]);

        return $this->payment($request);
    }

    public function editTray(Request $request, $id)
    {
        $data = Tray::find($id);

        $requestData = $request->all();
        $rent = $data->update($requestData);

        return response()->json([
            'message' => 'Ordered',
            'info' => $rent
        ]);
    }

    public function deleteRent($id)
    {
        $data = Tray::where('id', $id)->delete();
        return response()->json([
            'message' => "Deleted"
        ]);
    }

    public function show()
    {
        return Tray::orderBy('id', 'DESC')->get();
    }

    public function status($id)
    {
        $data = Tray::find($id);
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
                'x-public-key' => 'pk_aa53096ced53364e971b490ef210320c',
                'amount' => $request['total'],
                'description' => 'Payment for' . ' ' . $request['order'],
                'customermobile' => $request['gcashtray'],
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

    public function search(Request $request)
    {
        $blog = Food::query();
        if ($request->input('searchkey') != "") {
            $keyword = $request->input('searchkey');
            $blog->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%$keyword%");
            });
        }
        return $blog->orderBy('name', 'desc')->first();
    }
}
