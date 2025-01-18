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

    public function index(Request $request)
    {

        // // Debug Auth::id() and check if the user is authenticated
        // if (!Auth::check()) {
        //     return redirect()->route('login')->with('error', 'You must be logged in to start the quiz.');
        // }

        // dd(Auth::id(), $request->query('category'));


        // Define available categories
        $categories = ['General Information', 'IQ Test', 'Coding', 'Pokemon'];

        // Get the selected category from the query, defaulting to null
        $category = $request->query('category');

        if (!$category) {
            // If no category is selected, pass only the categories to the view
            return view('quiz.index', compact('categories'));
        }

        // If a category is selected, fetch 10 random questions for the selected category
        $questions = \App\Models\Question::where('category', $category)
            ->inRandomOrder()
            ->limit(10)
            ->get();


        // Debugging: Check if questions are fetched
        if ($questions->isEmpty()) {
            dd("No questions found for category: " . $category);
        }

        // Store questions and category in the session for navigation
        session(['questions' => $questions, 'category' => $category]);

        // // Debugging session data
        // dd(session()->all());

        // Redirect to the first question
        return redirect()->route('quiz.question', ['index' => 0]);
    }

    public function question(Request $request, $index)
    {
        // Retrieve questions from the session
        // Ensure all questions have been answered
        $questions = session('questions', []);
        $category = session('category', 'Unknown');

        // Ensure the index is within bounds
        if (!isset($questions[$index])) {
            return redirect()->route('quiz.result');
        }

        // Get the current question
        $question = $questions[$index];

        // Calculate progress
        $progress = ($index + 1) / count($questions) * 100;

        return view('quiz.question', compact('question', 'index', 'progress', 'category'));
    }

    public function submitAnswer(Request $request)
    {
        // Store the user's answer in the session
        $answers = session('answers', []);
        $answers[$request->input('index')] = $request->input('answer');
        session(['answers' => $answers]);

        // Redirect to the next question or result page
        $nextIndex = $request->input('index') + 1;
        $questions = session('questions', []);

        if ($nextIndex >= count($questions)) {
            return redirect()->route('quiz.result');
        }

        return redirect()->route('quiz.question', ['index' => $nextIndex]);
    }

        // foreach ($answers as $id => $answer) {
        //     $question = Question::find($id);
        //     // Check Correctness:
        //     // Compares the submitted answer with the correct_option in the database.
        //     if ($question && $question->correct_option == $answer) {
        //         $score++;
        //     }
        // }

    public function result()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to save your score.');
        }

        $questions = session('questions', []);
        $answers = session('answers', []);
        $category = session('category', 'Unknown');
        $score = 0;

        // Ensure all questions have been answered
        if (empty($questions)) {
            return redirect()->route('quiz.index')->with('error', 'No questions available.');
        }


        foreach ($questions as $index => $question) {
            if (isset($answers[$index]) && $answers[$index] == $question->correct_option) {
                $score++;
            }
        }

        // // Debug user ID before saving
        // $userId = Auth::id();
        // if (!$userId) {
        //     return redirect()->route('login')->with('error', 'Failed to save your score. Please log in again.');
        // }

        // Save the score in the database
        Score::create([
            'user_id' => Auth::id(),
            'score' => $score,
            'category' => $category,
        ]);

        return view('quiz.result', compact('score', 'category'));
    }
}
