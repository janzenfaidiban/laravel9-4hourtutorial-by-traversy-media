<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use App\Models\User;
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
        // User::factory(5)->create();

       $user = User::factory()->create([
            'name' => 'Jhon Doe',
            'email' => 'john@gmail.com'
        ]);

        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);

        // Listing::create([
        //     'title' => 'Laarvel Senior Developer',
        //     'tags' => 'laravel, javascript',
        //     'company' => 'Nokensoft',
        //     'location' => 'Jayapura, Papua.',
        //     'email' => 'berkas@nokensoft.com',
        //     'website' => 'https://nokensoft.com',
        //     'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        // ]);

        // Listing::create([
        //     'title' => 'Full-Stack Engineer',
        //     'tags' => 'laravel, backend, api',
        //     'company' => 'SaCode',
        //     'location' => 'Kota Jayapura, Papua.',
        //     'email' => 'info@sacode.web.id',
        //     'website' => 'https://sacode.web.id',
        //     'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
    }
}
