<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_text',
        'correct_option',
        'category',
    ];

    // Define the inverse relationship to Score if needed
    public function scores()
    {
        return $this->hasMany(Score::class);
    }
}
