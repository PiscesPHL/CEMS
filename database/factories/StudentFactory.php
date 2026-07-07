<?php

// database/factories/StudentFactory.php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Generates a unique ID matching the '23-1358-588' format
            'student_number' => fake()->unique()->numerify('##-####-###'), 
            'email' => fake()->unique()->safeEmail(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            // Randomly assigns one of the established college courses
            'course' => fake()->randomElement(['BSIT', 'BSCS', 'BSIS', 'BSEMC']),
            // Randomly assigns a valid year level status
            'year_level' => fake()->randomElement(['1st Year', '2nd Year', '3rd Year', '4th Year', 'Irregular']),
        ];
    }
}
