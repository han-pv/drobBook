<?php

namespace Database\Seeders;

use App\Models\Book;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            CategorySeeder::class,
            LanguageSeeder::class,
            YearSeeder::class,
        ]);

        Author::factory(20)->create();

        Publisher::factory(40)->create();

        Publisher::factory()->create([
            'name' => 'Turkmen Dowlet Nesiryat Gullugy',
            'address' => 'Garry Gulyyew Koce, Ashgabat Turkmenistan'
        ]);

        Book::factory(50)->create();
    }
}
