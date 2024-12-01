<?php

namespace Database\Seeders;

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
        // User::factory(1)->create();

        User::factory()->create([
            'first_name' => 'Luba',
            'last_name' => 'Habarta',
            'username' => 'lubahabarta',
            'email' => 'habarta@deepvision.cz',
            'password' => bcrypt('test'),
        ]);

        User::factory()->create([
            'first_name' => 'Test',
            'last_name' => 'Test',
            'username' => 'test',
            'email' => 'test@test.test',
            'password' => bcrypt('test'),
        ]);

        $this->call([
            ProductSeeder::class,
        ]);
    }
}
