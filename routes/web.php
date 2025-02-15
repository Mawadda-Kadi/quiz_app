<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\LeaderboardController;
use Illuminate\Http\Request;

Route::get('/', function () {
    $categories = ['General Information', 'IQ Test', 'Coding', 'Pokemon'];
    return view('welcome', compact('categories'));
});

// The auth middleware ensures that only authenticated users can access these routes
// If the user is not logged in, the request is redirected to the login page
// ->group used to apply middleware to multiple routes without repeating it
Route::middleware(['auth'])->group(function () {
    Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');
    Route::get('/quiz/question/{index}', [QuizController::class, 'question'])->name('quiz.question');
    Route::post('/quiz/submit', [QuizController::class, 'submitAnswer'])->name('quiz.submitAnswer');
    Route::get('/quiz/result', [QuizController::class, 'result'])->name('quiz.result');
    Route::get('/player/{username}', [PlayerController::class, 'show'])->name('player.show');
});

Route::get('/leaderboard', [\App\Http\Controllers\LeaderboardController::class, 'index'])->name('leaderboard.index');

// Route::get('/quiz/result', function (Request $request) {
//     return view('quiz.result', ['score' => $request->query('score')]);
// })->name('quiz.result');

Route::get('/quiz/instructions', function () {
    return view('quiz/instructions');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
