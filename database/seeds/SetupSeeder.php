<?php

use App\Setup;
use Illuminate\Database\Seeder;

class SetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Setup::create([
            "setup" => "Dinnerware and Glassware
            Tables with covers and Centerpiece
            Monoblock Chair with covers
            Basic Backdrop
            Stage/Platform set-up
            "
        ]);
        Setup::create([
            "setup" => "Tables with covers and Centerpiece (Standard Set-up)
            Monoblock Chair with covers
            Standard Backdrop
            Stage/Platform set-up (Standard)
            Red Carpet
            Entrance Arc
            "
        ]);
        Setup::create([
            "setup" => "Dinnerware and Glassware
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
            Audio Mixer
            "
        ]);
        Setup::create([
            "setup" => "Dinnerware and Glassware
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
            Mushroom Ball Light
            "
        ]);
    }
}
