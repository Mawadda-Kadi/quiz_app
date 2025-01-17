<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Score;

class LeaderboardController extends Controller
{
    /**
     * Display the leaderboard.
     */
    public function index()
    {
        // Fetch scores ordered by score (desc) and created_at (desc)
        $scores = Score::with('user')
            ->orderBy('score', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();

        // Pass the scores to the view
        return view('leaderboard.index', compact('scores'));
    }
}
