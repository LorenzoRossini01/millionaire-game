<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'start_time',
        'end_time',
    ];

    // relazione one to many con user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    // relazione one to many con gamequestions
    public function gameQuestions()
    {
        return $this->hasMany(GameQuestion::class);
    }
    
    // relazione one to many con gamehints
    public function gameHints()
    {
        return $this->hasMany(GameHint::class);
    }
}
