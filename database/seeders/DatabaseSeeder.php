<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Tuantq',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12341234'),
        ]);

        \App\Models\Category::factory(100)->create();
        \App\Models\Post::factory(100)->create();
        \App\Models\Tag::factory(100)->create();
    }
}
