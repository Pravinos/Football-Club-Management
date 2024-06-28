<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Club>
 */
class ClubFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company. ' FC',
            'country' => $this->faker->country,
            'founded_year' => $this->faker->year,
            'stadium' => $this->faker->word . ' Stadium',
            'manager_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}