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
        \App\Models\User::factory(20)
            ->has(\App\Models\Store::factory(5)
                ->has(\App\Models\Category::factory(20))
            )
            ->create();

        \App\Models\Admin::factory(5)->create();
    }
}
