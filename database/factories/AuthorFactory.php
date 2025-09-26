<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
                                                         // 1925                  2005      
        $birthDate = fake()->dateTimeBetween('-100 years', '-20 years');
        return [
            'name' => fake()->name(),
            'birth_date' => $birthDate,
            'death_date' => fake()->boolean(50) ? fake()->dateTimeBetween($birthDate, 'now') : null,
        ];
    }
}
