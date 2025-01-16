<?php

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        Question::create([
            'question' => 'What is the capital of France?',
            'options' => json_encode(['Paris', 'London', 'Berlin', 'Madrid']),
            'correct_option' => '0' // Index of 'Paris'
        ]);

        Question::create([
            'question' => 'What is 2 + 2?',
            'options' => json_encode(['3', '4', '5', '6']),
            'correct_option' => '1' // Index of '4'
        ]);
    }
}
?>