<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Reply;
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
        User::factory()->create(['name' => 'Rodolfo Riveros Mitma', 'email' => 'riveros70397516@gmail.com', 'password' =>'123456789']);
        User::factory(9)->create();
        Category::factory(10)
            ->hasThreads(20)
            ->create();
        Reply::factory(400)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
