<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_text',
        'difficulty',
        'category',
    ];

    // relazione one to many con answers
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    
    // relazione one to many con gamequestions
    public function gameQuestions()
    {
        return $this->hasMany(GameQuestion::class);
    }
}
