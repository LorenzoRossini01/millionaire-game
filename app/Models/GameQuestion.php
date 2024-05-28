<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'question_id',
        'order',
    ];

    // relazione one to many con game
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
    
    // relazione one to many con question
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    
    // relazione one to many con useranswer
    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class);
    }
}
