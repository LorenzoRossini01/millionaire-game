<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameHint extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'hint_id',
        'used',
    ];

    // relazione one to many con game
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
    
    // relazione one to many con hint
    public function hint()
    {
        return $this->belongsTo(Hint::class);
    }
}
