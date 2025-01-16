<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        $questions = [
            [
                'question' => 'What is the square root of 144?',
                'options' => json_encode(['10', '12', '14', '16']),
                'correct_option' => '1', // '12'
            ],
            [
                'question' => 'Who wrote the novel "1984"?',
                'options' => json_encode(['George Orwell', 'Aldous Huxley', 'J.K. Rowling', 'Mark Twain']),
                'correct_option' => '0', // 'George Orwell'
            ],
            [
                'question' => 'What is the chemical symbol for gold?',
                'options' => json_encode(['Au', 'Ag', 'Fe', 'Hg']),
                'correct_option' => '0', // 'Au'
            ],
            [
                'question' => 'What is the capital city of Canada?',
                'options' => json_encode(['Toronto', 'Ottawa', 'Vancouver', 'Montreal']),
                'correct_option' => '1', // 'Ottawa'
            ],
            [
                'question' => 'Which planet is the hottest in the solar system?',
                'options' => json_encode(['Mercury', 'Venus', 'Mars', 'Jupiter']),
                'correct_option' => '1', // 'Venus'
            ],
            [
                'question' => 'What is the hardest natural substance on Earth?',
                'options' => json_encode(['Steel', 'Diamond', 'Graphite', 'Quartz']),
                'correct_option' => '1', // 'Diamond'
            ],
            [
                'question' => 'Who painted the ceiling of the Sistine Chapel?',
                'options' => json_encode(['Leonardo da Vinci', 'Michelangelo', 'Raphael', 'Donatello']),
                'correct_option' => '1', // 'Michelangelo'
            ],
            [
                'question' => 'What is the smallest prime number?',
                'options' => json_encode(['0', '1', '2', '3']),
                'correct_option' => '2', // '2'
            ],
            [
                'question' => 'Which element is necessary for the process of photosynthesis?',
                'options' => json_encode(['Carbon Dioxide', 'Oxygen', 'Hydrogen', 'Nitrogen']),
                'correct_option' => '0', // 'Carbon Dioxide'
            ],
            [
                'question' => 'What is the name of the largest ocean on Earth?',
                'options' => json_encode(['Atlantic Ocean', 'Indian Ocean', 'Arctic Ocean', 'Pacific Ocean']),
                'correct_option' => '3', // 'Pacific Ocean'
            ],
        ];

        foreach ($questions as $question) {
            DB::table('questions')->insert([
                'question' => $question['question'],
                'options' => $question['options'],
                'correct_option' => $question['correct_option'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}