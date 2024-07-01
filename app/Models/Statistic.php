<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'player_id',
        'matches_played',
        'goals',
        'assists',
        'yellow_cards',
        'red_cards',
        'minutes_played',
    ];

    /**
     * Get the player that owns the statistics.
     */
    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
