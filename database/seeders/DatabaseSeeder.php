<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pizza;
use App\Models\Topping;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Pizza::create([
            'name' => 'Farmhouse',
            'price_large' => 499,
            'price_medium' => 299,
            'price_small' => 149,
        ]);

        Pizza::create([
            'name' => 'Margarita',
            'price_large' => 199,
            'price_medium' => 99,
            'price_small' => 79,
        ]);

        Pizza::create([
            'name' => 'Peppy Paneer',
            'price_large' => 799,
            'price_medium' => 599,
            'price_small' => 299,
        ]);


        Topping::create([
            'name' => 'Extra Cheese',
            'price_large' => 100,
            'price_medium' => 70,
            'price_small' => 40,
        ]);

        Topping::create([
            'name' => 'Jalapenos',
            'price_large' => 80,
            'price_medium' => 50,
            'price_small' => 30,
        ]);

        Topping::create([
            'name' => 'Sweet Corns',
            'price_large' => 150,
            'price_medium' => 100,
            'price_small' => 70,
        ]);

        Topping::create([
            'name' => 'Extra Veggies',
            'price_large' => 90,
            'price_medium' => 70,
            'price_small' => 40,
        ]);
    }
}
