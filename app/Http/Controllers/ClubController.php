<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Club::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'founded_year' => 'required|integer',
            'stadium' => 'required|string|max:255',
            'manager_id' => 'required|exists:users,id'
        ]);

        $club = Club::create($validated);

        return response()->json($club, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Club $club)
    {
        return response()->json($club, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Club $club)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'country' => 'sometimes|required|string|max:255',
            'founded_year' => 'sometimes|required|integer',
            'stadium' => 'sometimes|required|string|max:255',
            'manager_id' => 'sometimes|required|exists:users,id'
        ]);

        $club->update($validated);

        return response()->json($club, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Club $club)
    {
        $club->delete();

		return response()->json('OK', 200);
    }
}
