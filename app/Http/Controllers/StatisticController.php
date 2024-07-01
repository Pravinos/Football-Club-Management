<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index(Player $player)
    {
        return response()->json($player->statistic, 200);
    }

    public function store(Request $request, Player $player)
    {
        $request->validate([
            'matches_played' => 'required|integer|min:0',
            'goals' => 'required|integer|min:0',
            'assists' => 'required|integer|min:0',
            'yellow_cards' => 'required|integer|min:0',
            'red_cards' => 'required|integer|min:0',
            'minutes_played' => 'required|integer|min:0',
        ]);

        if ($player->statistic) {
            return response()->json(['message' => 'Player already has statistics.'], 409);
        }

        $statistic = new Statistic($request->all());
        $statistic->player_id = $player->id;
        $statistic->save();

        return response()->json($statistic, 200);
    }

    public function update(Request $request, Player $player, Statistic $statistic)
    {
        if ($player->statistic->id !== $statistic->id) {
            return response()->json(['message' => 'Statistic not found for this player.'], 404);
        }

        $request->validate([
            'matches_played' => 'integer|min:0',
            'goals' => 'integer|min:0',
            'assists' => 'integer|min:0',
            'yellow_cards' => 'integer|min:0',
            'red_cards' => 'integer|min:0',
            'minutes_played' => 'integer|min:0',
        ]);

        $statistic->update($request->all());

        return response()->json($statistic, 200);
    }

    public function destroy(Player $player, Statistic $statistic)
    {
        if ($player->statistic->id !== $statistic->id) {
            return response()->json(['message' => 'Statistic not found for this player.'], 404);
        }

        $statistic->delete();

        return response()->json('OK', 200);
    }
}
