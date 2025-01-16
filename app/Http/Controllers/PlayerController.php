<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Score;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function show($username)
    {
        // Decode the username when searching in the datebase
        $decodedUsername = urldecode($username);

        // Perform case-insensitive matching
        $user = User::whereRaw('LOWER(name) = ?', [strtolower($decodedUsername)])->firstOrFail();

        $scores = Score::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('player.show', compact('user', 'scores'));
    }
}

