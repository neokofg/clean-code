<?php

namespace Database\Seeders\Optional;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(5)->create();
        $user = User::factory()->create();
        $token = $user->createToken('dev-token')->plainTextToken;
        print(PHP_EOL . "TOKEN: " . $token . PHP_EOL);
    }
}
