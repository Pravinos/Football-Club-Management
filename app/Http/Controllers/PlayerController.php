<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\User;

class PlayerController extends Controller
{
    public function index()
    {
        return response()->json(Player::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'club_id' => 'required|exists:clubs,id',
            'name' => 'required|string|max:255',
            'position' => 'required|string|in:goalkeeper,defender,midfielder,forward',
            'date_of_birth' => 'required|date',
            'nationality' => 'required|string|max:255',
        ]);

        $player = Player::create($request->all());

        return response()->json($player, 200);
    }

    public function show(Player $player)
    {
        return response()->json($player, 200);
    }

    public function update(Request $request, Player $player)
    {
        $request->validate([
            'club_id' => 'sometimes|required|exists:clubs,id',
            'name' => 'sometimes|required|string|max:255',
            'position' => 'sometimes|required|string|in:goalkeeper,defender,midfielder,forward',
            'date_of_birth' => 'sometimes|required|date',
            'nationality' => 'sometimes|required|string|max:255',
        ]);

        $player->update($request->all());

        return response()->json($player, 200);
    }

    public function destroy(Player $player)
    {
        $player->delete();

        return response()->json('OK', 200);
    }
}
