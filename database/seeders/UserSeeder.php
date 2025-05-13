<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'test1',
            'email' => 'test1@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('@Testing'),
            'remember_token' => Str::random(10),
        ]);

        // Create regular users
        \App\Models\User::factory()->create();
    }
}
