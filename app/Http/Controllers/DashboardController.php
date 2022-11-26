<?php

namespace App\Http\Controllers;

use App\Rent;
use App\Reservation;
use App\Tray;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    //

    public function details()
    {
        $cater =  Reservation::count();
        $tray = Tray::count();
        $rent = Rent::count();
        return [
            "clients" => User::where('user_type', 0)->count(),
            "tray" => Tray::count(),
            "rent" => Rent::count(),
            "catering" => Reservation::count(),
            "pie" => [$cater, $tray, $rent]
        ];
    }

    public function charts(Request $request)
    {
        $y = Carbon::createFromFormat('Y', $request->date)->format('Y');
        $dates = [];
        for ($i = 1; $i <= 12; $i++) {
            $dates[] = [
                [
                    Carbon::createFromFormat('Y-m-d', $y . '-' . $i . '-1')->toDateString(),
                    Carbon::createFromFormat('Y-m-d', $y . '-' . $i . '-1')->endOfMonth()->addDays(1)->toDateString()
                ],

            ];
        };
        $results = [];
        foreach ($dates as $key => $date) {
            $results[] = [
                Reservation::whereBetween('created_at', [$date[0]])->count(),

            ];
        }
        return $results;
    }
}
