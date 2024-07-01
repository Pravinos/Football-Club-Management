<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Club;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'club_id' => Club::inRandomOrder()->first()->id,
            'name' => $this->faker->name,
            'position' => $this->faker->randomElement(['goalkeeper', 'defender', 'midfielder', 'forward']),
            'date_of_birth' => $this->faker->dateTimeBetween('-26 years', '-17 years')->format('Y-m-d'),
            'nationality' => $this->faker->country,
        ];
    }
}
