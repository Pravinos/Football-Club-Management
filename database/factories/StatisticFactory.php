<?php

namespace Database\Factories;

use App\Models\Statistic;
use App\Models\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

class StatisticFactory extends Factory
{
    protected $model = Statistic::class;

    public function definition(): array
    {
        // Get a player with no existing statistics
        $player = Player::doesntHave('statistic')->inRandomOrder()->first();

        $position = $player->position;
    
        // Default statistics
        $matches_played = $this->faker->numberBetween(0, 50);
        $minutes_played = $this->faker->numberBetween(0, $matches_played * 90);

        switch ($position) {
            case 'goalkeeper':
                $goals = $this->faker->numberBetween(0, 2);
                $assists = $this->faker->numberBetween(0, 5);
                break;
            case 'defender':
                $goals = $this->faker->numberBetween(0, 5);
                $assists = $this->faker->numberBetween(0, 10);
                break;
            case 'midfielder':
                $goals = $this->faker->numberBetween(0, 10);
                $assists = $this->faker->numberBetween(0, 15);
                break;
            case 'forward':
                $goals = $this->faker->numberBetween(5, 20);
                $assists = $this->faker->numberBetween(5, 15);
                break;
        }

        return [
            'player_id' => $player->id,
            'matches_played' => $matches_played,
            'goals' => $goals,
            'assists' => $assists,
            'yellow_cards' => $this->faker->numberBetween(0, 10),
            'red_cards' => $this->faker->numberBetween(0, 5),
            'minutes_played' => $minutes_played,
        ];
    }
}
