<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;


class QuizController extends Controller
/*
. Displays the introduction page.
. Starts the quiz and fetches questions.
. Processes user answers and calculates their score.
. Saves the score in the database
 */
{

    public function index()
    {
        // Display quiz introduction page
        return view('quiz.index');
    }


    public function start(Request $request)
    {
        $category = $request->query('category', 'General Information'); // Default category

        // Fetch 10 random questions from the selected category
        $questions = \App\Models\Question::where('category', $category)
            ->inRandomOrder()
            ->limit(10)
            ->get();

        // compact('questions') sends the data to the Blade view
        return view('quiz.start', compact('questions', 'category'));
    }

    
    public function chooseCategory()
    {
        $categories = ['General Information', 'IQ Test', 'Coding', 'Pokemon'];

        return view('quiz.choose-category', compact('categories'));
    }


    public function submit(Request $request)
    {
        // Initialize Variables
        $score = 0;
        $answers = $request->input('answers');
        // Associative array retrieves the user's submitted answers from the request
        // keys are question IDs and values are the selected options.


        foreach ($answers as $id => $answer) {
            $question = Question::find($id);
            // Check Correctness:
            // Compares the submitted answer with the correct_option in the database.
            if ($question && $question->correct_option == $answer) {
                $score++;
            }
        }

        // Save the score in the database
        Score::create([
            'user_id' => Auth::id(),
            'score' => $score
        ]);

        // Redirect to the result page with the score as a query parameter
        return redirect()->route('quiz.result', ['score' => $score]);
    }
}
