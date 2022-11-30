<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GCashController extends Controller
{
    //
    public function payment()
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
                // 'x-public-key' => 'pk_aa53096ced53364e971b490ef210320c',
                'x-public-key' => 'pk_a63c3c432c45f68d0607100765d7d768',
                'amount' => '10032213312',
                'description' => 'Payment for services rendered',
                'customermobile' => '3123123123213'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
}
