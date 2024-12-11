<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobPosting>
 */
class JobPostingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'recruiter_id' => 1,
            'position' => $this->faker->jobTitle(),
            'place' => $this->faker->city(),
            'salary' => mt_rand(1000000, 5000000),
            'description' => $this->faker->paragraph(mt_rand(2, 4)),
            'criteria' => ['Cekatan', 'Teliti'],
            'requirement' => ['Usia minimal 20 tahun', 'Berwarganegara Indonesia'],
            'status' => 'On going',
            'end_date' => $this->faker->date()
        ];
    }
}
