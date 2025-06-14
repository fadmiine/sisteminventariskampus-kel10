<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
<<<<<<< Updated upstream
<<<<<<< Updated upstream
=======
>>>>>>> parent of 7256fa1 (admin)
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
<<<<<<< HEAD
=======
        // User::factory(10)->create();
$this->call([
    UserSeeder::class,
]);

>>>>>>> Stashed changes
=======
        // User::factory(10)->create();
$this->call([
    UserSeeder::class,
]);

>>>>>>> Stashed changes
=======
>>>>>>> parent of 7256fa1 (admin)
    }
}
