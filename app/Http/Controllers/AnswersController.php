<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAnswerRequest;
use App\Http\Requests\UpdateAnswerRequest;
use App\Models\Answer;
use App\Models\Question;
use App\Notifications\NewReplyAdded;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AnswersController extends Controller
{
    public function store(CreateAnswerRequest $request, Question $question)
    {
        $question->answers()->create([
            'body' => $request->body,
            'user_id' =>auth()->id()
        ]);
        $question->owner->notify(new NewReplyAdded($question));
        session()->flash('success','Your Answer submitted Successfully');
        return redirect($question->url);
    }

    public function edit(Question $question,Answer $answer)
    {
        Gate::authorize('update',$answer);
        return view('qa.answers._edit',compact(['question','answer']));
    }

    public function update(UpdateAnswerRequest $request,Question $question,Answer $answer)
    {
        Gate::authorize('update',$answer);
        $answer->update(['body' => $request->body]);

        session()->flash('success','Your Answer has been updated successfully');
        return redirect($question->url);
    }

    public function destroy(Question $question,Answer $answer)
    {
        Gate::authorize('delete',$answer);
        $answer->delete();
        session()->flash('success','Your answer has been updated successfully');
        return redirect($question->url);
    }
}
