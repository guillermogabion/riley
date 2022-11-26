<?php

use App\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Package::create([
            "name" => "Basic Package",
            "course" => "3",
            "pax" => "50",
            "price_per_head" => "380",
            "set_up" => "Dinnerware and Glassware
            Tables with covers and Centerpiece
            Monoblock Chair with covers
            Basic Backdrop
            Stage/Platform set-up",

        ]);
        Package::create([
            "name" => "Silver Package",
            "course" => "4",
            "pax" => "100",
            "price_per_head" => "500",
            "set_up" => "Tables with covers and Centerpiece (Standard Set-up)
            Monoblock Chair with covers
            Standard Backdrop
            Stage/Platform set-up (Standard)
            Red Carpet
            Entrance Arc"
        ]);
        Package::create([
            "name" => "Gold Package",
            "course" => "5",
            "pax" => "750",
            "price_per_head" => "750",
            "set_up" => "Dinnerware and Glassware
            Tables with covers and Centerpiece (Upgraded Set-up)
            Monoblock Chairs with covers
            Upgraded Backdrop
            Stage/Platform set-up (Upgraded)
            Red Carpet
            Entrance Arc
            
            Sound System and Lights
            2 Speakers
            4 LED Lights
            2 wireless mic (one extra wired-mic)
            Audio Mixer"

        ]);
        Package::create([
            "name" => "Premium Package",
            "course" => "5",
            "pax" => "200",
            "price_per_head" => "1000",
            "set_up" => "Dinnerware and Glassware
            Tables with covers and Centerpiece (Upgraded Set-up)
            Monoblock Chairs with covers
            Full Design Backdrop
            Stage/Platform Set-up (Fully Upgraded)
            Red Carpet
            Entrance Arc (Full Design)
            
            Sound System and Lights
            4 Speakers
            6 LED Lights
            3 wireless mic (one extra wired-mic)
            Audio Mixer
            Bubble and Smoke Effects
            Mushroom Ball Light"

        ]);
    }
}
