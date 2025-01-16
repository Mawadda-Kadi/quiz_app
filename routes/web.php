<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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
