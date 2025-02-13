<?php

namespace Database\Seeders;

use App\Models\Candidate;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DevelopmentSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@test.ic',
            'password' => Hash::make('password'),

        ])->assignRole('admin');

        $this->call([
            CandidateSeeder::class
        ]);
    }
}
