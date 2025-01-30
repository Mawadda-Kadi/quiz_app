<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Score;

class LeaderboardController extends Controller
{
    /**
     * Display the leaderboard.
     */

    public function index()
    {

        $category = session('category');

        // Fetch scores ordered by score (desc) and created_at (desc)
        $scores = Score::with('user')
        ->orderBy('score', 'desc')
        ->orderBy('created_at', 'desc')
        ->take(10) // Limit to the top 10
            ->get();

        // Debugging
        //dd($category, session()->all());
        //dd($scores);

        return view('leaderboard.index', compact('scores'));
    }
}