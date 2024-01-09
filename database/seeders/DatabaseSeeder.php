<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Ciudad;
use App\Models\Pais;
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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Pais::create(['nombre' => 'Alemania']);
        Pais::create(['nombre' => 'Italia']);
        Ciudad::create(['id_pais' => 1, 'nombre' => 'Munich']);
        Ciudad::create(['id_pais' => 1, 'nombre' => 'Berlin']);
        Ciudad::create(['id_pais' => 1, 'nombre' => 'Dusseldorf']);
        Ciudad::create(['id_pais' => 2, 'nombre' => 'Roma']);
        Ciudad::create(['id_pais' => 2, 'nombre' => 'Milan']);
        Ciudad::create(['id_pais' => 2, 'nombre' => 'Napoles']);

        Tag::create(['nombre' => 'Laravel', 'slug' => 'laravel']);
        Tag::create(['nombre' => 'Vue JS', 'slug' => 'vue-js']);
        Tag::create(['nombre' => 'Livewire', 'slug' => 'livewire']);
    }
}
