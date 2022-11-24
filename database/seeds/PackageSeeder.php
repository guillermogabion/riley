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
            "price_per_head" => "380"
        ]);
        Package::create([
            "name" => "Silver Package",
            "course" => "4",
            "pax" => "100",
            "price_per_head" => "500"
        ]);
        Package::create([
            "name" => "Gold Package",
            "course" => "5",
            "pax" => "150",
            "price_per_head" => "750"
        ]);
        Package::create([
            "name" => "Premium Package",
            "course" => "5",
            "pax" => "200",
            "price_per_head" => "1000"
        ]);
    }
}
