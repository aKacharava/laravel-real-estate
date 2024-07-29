<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'test@test.nl',
            'is_admin' => true,
        ]);
        User::factory()->create([
            'name' => 'Jane Smith',
            'email' => 'test2@test.nl',
        ]);
        Listing::factory(10)->create([
            'by_user_id' => 1,
        ]);
        Listing::factory(10)->create([
            'by_user_id' => 2,
        ]);
    }
}
