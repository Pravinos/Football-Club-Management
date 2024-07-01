<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Statistic;
use App\Models\Player;

class StatisticsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Get all players
       $players = Player::all();

       // Create one statistic for each player
       foreach ($players as $player) {
           Statistic::factory()->create([
               'player_id' => $player->id,
           ]);
        }
    }
}
