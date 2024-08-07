<?php
// app/Http/Controllers/VoteController.php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function voteAnswer(Request $request, Answer $answer)
    {
        $vote = $request->vote;
        $user = Auth::user();

        $existingVote = $answer->votes()->where('user_id', $user->id)->first();

        if ($existingVote) {
            if ($existingVote->vote == $vote) {
                $existingVote->delete();
            } else {
                $existingVote->update(['vote' => $vote]);
            }
        } else {
            $answer->votes()->create([
                'user_id' => $user->id,
                'vote' => $vote
            ]);
        }

        return redirect()->back();
    }
}
