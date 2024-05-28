<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hint extends Model
{
    use HasFactory;

    protected $fillable = [
        'hint_name',
        'description',
    ];

    // relazione one to many con gamehints

    public function gameHints()
    {
        return $this->hasMany(GameHint::class);
    }
}
