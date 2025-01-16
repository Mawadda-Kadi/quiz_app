<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/quiz/start', function() {
    return view('quiz.start');
});

Route::get('/quiz/index', function() {
    return view('quiz.index');
});

Route::get('/quiz/result', function() {
    return view('quiz.result');
});

Route::get('/quiz/instructions', function () {
    return view('quiz.instructions');
});
// Route Wildcard
Route::get('/scoreboard/index/{id}', function ($id) {
    // fetch score with id
    return view('scoreboard.index', ["id" => $id]);
});

//Route::get('/', [QuizController::class, 'index']);
//Route::get('/quiz', [QuizController::class, 'startQuiz']);
//Route::post('/quiz', [QuizController::class, 'submitQuiz']);
//Route::get('/scoreboard', [ScoreController::class, 'index']);

// Use route groups for authentication-protected pages
//Route::middleware(['auth'])->group(function () {
    //Route::get('/quiz', [QuizController::class, 'startQuiz']);
//});

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
