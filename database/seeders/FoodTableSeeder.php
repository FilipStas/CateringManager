<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $foods = [
            ['name' => 'Pizza'],
            ['name' => 'Burger'],
            ['name' => 'Pasta'],
            ['name' => 'Salad'],
            ['name' => 'Sushi'],
            ['name' => 'Tacos'],
            ['name' => 'Steak'],
            ['name' => 'Ice Cream'],
            ['name' => 'bravcove rezne'],
            ['name' => 'kuracie rezne'],
        ];
        foreach ($foods as $food) {
            \DB::table('food')->insert($food);
        }
    }
}
