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
        \App\Models\User::factory(15)
            ->has(\App\Models\Store::factory(4)
                ->hasCategories(15)
                ->hasProducts(50)
            )
            ->create();

        \App\Models\Admin::factory(5)->create();
    }
}
