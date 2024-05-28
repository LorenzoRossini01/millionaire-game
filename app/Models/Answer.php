<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'answer_text',
        'is_correct',
    ];

    // relazione one to many con questions
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    
    // relazione one to many con useranswers
    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class);
    }
}
