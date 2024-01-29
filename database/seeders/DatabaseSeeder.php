<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\City;
use App\Models\Country;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'admin',
        ]);

        Country::create(['name' => 'Alemania']);
        Country::create(['name' => 'Italia']);
        City::create(['country_id' => 1, 'name' => 'Munich']);
        City::create(['country_id' => 1, 'name' => 'Dusseldorf']);
        City::create(['country_id' => 1, 'name' => 'Berlin']);
        City::create(['country_id' => 2, 'name' => 'Roma']);
        City::create(['country_id' => 2, 'name' => 'Napoles']);
        City::create(['country_id' => 2, 'name' => 'Milan']);

        Tag::create(['name' => 'Indie', 'slug' => 'indie']);
        Tag::create(['name' => 'Rock', 'slug' => 'rock']);
        Tag::create(['name' => 'Heavy', 'slug' => 'heavy']);
    }
}
