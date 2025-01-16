<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\PlayerController;

Route::get('/', function () {
    return view('welcome');
});

// The auth middleware ensures that only authenticated users can access these routes
// If the user is not logged in, the request is redirected to the login page
// ->group used to apply middleware to multiple routes without repeating it
Route::middleware(['auth'])->group(function () {
    Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');
    Route::get('/quiz/start', [QuizController::class, 'start'])->name('quiz.start');
    Route::post('/quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit');
    Route::get('/player/{username}', [PlayerController::class, 'show'])->name('player.show');
});

Route::get('/quiz/instructions', function () {
    return view('quiz/instructions');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
