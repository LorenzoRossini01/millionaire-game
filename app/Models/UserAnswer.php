<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_question_id',
        'answer_id',
        'is_correct',
    ];


    // relazione one to many con gamequestions
    
    public function gameQuestion()
    {
        return $this->belongsTo(GameQuestion::class);
    }
    
    // relazione one to many con answer
    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }
}
