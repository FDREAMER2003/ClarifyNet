<?php
// app/Models/AnswerVote.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnswerVote extends Model
{
    protected $guarded = [];

    protected $table = 'answer_votes';

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
