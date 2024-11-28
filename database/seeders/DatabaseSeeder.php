<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\JobPosting;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Jane',
            'email' => 'recruiter@gmail.com',
            'role' => 'recruiter'
        ]);

        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'jobseeker@gmail.com',
            'role' => 'jobseeker'
        ]);

        JobPosting::factory()->create([
            'position' => 'Gardener',
            'place' => 'Tokopedia Capital Place'
        ]);

        JobPosting::factory()->create([
            'position' => 'Accountant',
            'place' => 'Daihatsu HQ'
        ]);
        
    }
}
