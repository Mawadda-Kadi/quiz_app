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

    public function start()
    {
        // Fetch all questions and pass to the view
        $questions = Question::all();
        return view('quiz.start', compact('questions'));
        // compact('questions') sends the data to the Blade view
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

        // Passes the calculated score to the quiz.result view for display
        return view('quiz.result', compact('score'));
    }
}
