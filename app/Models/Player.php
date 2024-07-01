<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Club;
use App\Models\Statistic;

class Player extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'club_id',
        'name',
        'position',
        'date_of_birth',
        'nationality',
    ];

    /**
     * Get the club that the player belongs to.
     */
    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function statistic()
    {
        return $this->hasOne(statistic::class);
    }
}

