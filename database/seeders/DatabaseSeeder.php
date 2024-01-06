<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Optional\UserSeeder as OptionalUsers;
use Database\Seeders\Important\UserSeeder as ImportantUsers;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if(env('APP_ENV') == 'production') {
            $this->call([
                ImportantUsers::class
            ]);
        } else {
            $this->call([
                OptionalUsers::class,
                ImportantUsers::class
            ]);
        }
    }
}
