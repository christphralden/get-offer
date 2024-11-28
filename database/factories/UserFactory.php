<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->name,
            'email' => $this->faker->unique()->safeEmail,
            'role' => $this->faker->randomElement(['jobseeker', 'recruiter']),
            'phone_number' => $this->faker->phoneNumber,
            'password' => Hash::make('12345678'), // Password fixed as '12345678'
            'link' => $this->faker->url,
        ];
    }
}
