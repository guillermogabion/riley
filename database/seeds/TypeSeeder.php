<?php

use App\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Type::create([
            "name" => "Dish"
        ]);
        Type::create([
            "name" => "Seafood"
        ]);

        Type::create([
            "name" => "Soup"
        ]);
        Type::create([
            "name" => "Vegetables"
        ]);
        Type::create([
            "name" => "Pasta"
        ]);
        Type::create([
            "name" => "Dessert"
        ]);
        Type::create([
            "name" => "Rice"
        ]);
        Type::create([
            "name" => "Drinks"
        ]);
    }
}
