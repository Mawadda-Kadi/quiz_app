<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        $questions = [
            // General Information
            [
                'question' => 'What is the smallest country in the world by area?',
                'options' => json_encode(['Monaco', 'Vatican City', 'San Marino', 'Liechtenstein']),
                'correct_option' => '1',
                'category' => 'General Information',
            ],
            [
                'question' => 'Which element has the chemical symbol O?',
                'options' => json_encode(['Oxygen', 'Osmium', 'Gold', 'Argon']),
                'correct_option' => '0',
                'category' => 'General Information',
            ],
            [
                'question' => 'Who painted the Mona Lisa?',
                'options' => json_encode(['Vincent van Gogh', 'Leonardo da Vinci', 'Michelangelo', 'Pablo Picasso']),
                'correct_option' => '1',
                'category' => 'General Information',
            ],
            [
                'question' => 'What is the capital of Japan?',
                'options' => json_encode(['Tokyo', 'Osaka', 'Kyoto', 'Hiroshima']),
                'correct_option' => '0',
                'category' => 'General Information',
            ],
            [
                'question' => 'Which planet is closest to the Sun?',
                'options' => json_encode(['Venus', 'Mars', 'Earth', 'Mercury']),
                'correct_option' => '3',
                'category' => 'General Information',
            ],

            // Coding
            [
                'question' => 'Which language is primarily used for Android development?',
                'options' => json_encode(['Swift', 'Python', 'Kotlin', 'Ruby']),
                'correct_option' => '2',
                'category' => 'Coding',
            ],
            [
                'question' => 'What does CSS stand for?',
                'options' => json_encode(['Computer Style System', 'Cascading Style Sheets', 'Creative Style Syntax', 'Custom Style Syntax']),
                'correct_option' => '1',
                'category' => 'Coding',
            ],
            [
                'question' => 'Which company developed Java?',
                'options' => json_encode(['Microsoft', 'Sun Microsystems', 'Apple', 'Google']),
                'correct_option' => '1',
                'category' => 'Coding',
            ],
            [
                'question' => 'Which of the following is used to style HTML elements?',
                'options' => json_encode(['HTML', 'CSS', 'PHP', 'SQL']),
                'correct_option' => '1',
                'category' => 'Coding',
            ],
            [
                'question' => 'What does PHP stand for?',
                'options' => json_encode(['Personal Hypertext Processor', 'PHP Hypertext Preprocessor', 'Private Hypertext Processor', 'None of the above']),
                'correct_option' => '1',
                'category' => 'Coding',
            ],

            // IQ Test
            [
                'question' => 'If a clock shows 3:15, what is the angle between the hour and the minute hand?',
                'options' => json_encode(['0°', '7.5°', '90°', '97.5°']),
                'correct_option' => '1',
                'category' => 'IQ Test',
            ],
            [
                'question' => 'What comes next in the series: 5, 10, 20, 40, ?',
                'options' => json_encode(['60', '80', '100', '70']),
                'correct_option' => '1',
                'category' => 'IQ Test',
            ],
            [
                'question' => 'What is the next number in the series: 1, 1, 2, 3, 5, 8, ?',
                'options' => json_encode(['11', '12', '13', '21']),
                'correct_option' => '1',
                'category' => 'IQ Test',
            ],
            [
                'question' => 'If a train travels at 80 km/h for 3 hours, how far will it go?',
                'options' => json_encode(['200 km', '240 km', '180 km', '300 km']),
                'correct_option' => '1',
                'category' => 'IQ Test',
            ],
            [
                'question' => 'Which word does not belong in the group: Apple, Banana, Cherry, Carrot?',
                'options' => json_encode(['Apple', 'Banana', 'Cherry', 'Carrot']),
                'correct_option' => '3',
                'category' => 'IQ Test',
            ],

            // Pokemon
            [
                'question' => 'Which Pokémon is a fire-type?',
                'options' => json_encode(['Squirtle', 'Bulbasaur', 'Charmander', 'Pikachu']),
                'correct_option' => '2',
                'category' => 'Pokemon',
            ],
            [
                'question' => 'What level does Magikarp evolve into Gyarados?',
                'options' => json_encode(['20', '15', '30', '25']),
                'correct_option' => '0',
                'category' => 'Pokemon',
            ],
            [
                'question' => 'Which Pokémon is known as the "Legendary Bird of Fire"?',
                'options' => json_encode(['Zapdos', 'Moltres', 'Articuno', 'Ho-Oh']),
                'correct_option' => '1',
                'category' => 'Pokemon',
            ],
            [
                'question' => 'Which type is super effective against Dragon?',
                'options' => json_encode(['Steel', 'Ice', 'Fairy', 'Fire']),
                'correct_option' => '2',
                'category' => 'Pokemon',
            ],
            [
                'question' => 'What type of Pokémon is Lapras?',
                'options' => json_encode(['Water', 'Water/Ice', 'Ice', 'Dragon']),
                'correct_option' => '1',
                'category' => 'Pokemon',
            ],
        ];


        foreach ($questions as $question) {
            DB::table('questions')->insert([
                'question' => $question['question'],
                'options' => $question['options'],
                'correct_option' => $question['correct_option'],
                'category' => $question['category'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}