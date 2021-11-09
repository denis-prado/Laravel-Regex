<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(1)->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$q8M3.ga03qUQt5N13l/YhufpU5qkXklpKac/YNJsT1mCG0Vu6Tt6u'
        ]);
    }
}
