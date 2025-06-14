<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< Updated upstream
        $this->call([
            UserSeeder::class,
        ]);
     }
}
=======
        // User::factory(10)->create();
$this->call([
    UserSeeder::class,
]);

    }
}
     
>>>>>>> Stashed changes
