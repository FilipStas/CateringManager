<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void //  php artisan migrate:fresh --seed
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@testik.com',
        ]);
        $this->call(AdminUserSeeder::class);
     // $this->call(PolozkaSeeder::class);// Call the PolozkaSeeder to seed Polozka data
    }
}
