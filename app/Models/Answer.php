<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Answer extends Model
{
    protected $guarded = [];

    use HasFactory;

    public static function booted(): void
    {
        static::created(function (Answer $answer) {
            $answer->question->increment('answers_count');
        });
        static::deleted(function (Answer $answer) {
            $answer->question->decrement('answers_count');
        });
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function votes(): HasMany
    {
        return $this->hasMany(AnswerVote::class);
    }

    public function upVotes()
    {
        return $this->votes()->where('vote', 1);
    }

    public function downVotes()
    {
        return $this->votes()->where('vote', -1);
    }

    public function getVotesCountAttribute()
    {
        return $this->upVotes()->count() - $this->downVotes()->count();
    }
}
