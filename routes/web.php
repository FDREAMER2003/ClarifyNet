<?php

use App\Http\Controllers\AnswersController;
use App\Http\Controllers\FavouritesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\VotesController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/** Project routes */
Route::resource('questions', QuestionsController::class)->except(['show']);
Route::get('questions/{slug}',[QuestionsController::class , 'show'])->name('questions.show');
Route::resource('questions.answers', AnswersController::class)->except(['show','index','create']);

Route::post('questions/{question}/mark-as-fav', [FavouritesController::class, 'store'])->name('questions.favorite');
Route::delete('questions/{question}/mark-as-unfav', [FavouritesController::class, 'destroy'])->name('questions.unfavorite');
Route::post('/questions/{question}/vote/{vote}',[VotesController::class, 'voteQuestion'])->name('questions.vote');

Route::get('users/notifications', [UsersController::class, 'notifications'])->name('users.notifications');

Route::post('answers/{answer}/vote', [VoteController::class, 'voteAnswer'])->name('answers.vote');

Route::get('/', function () {
    // This route is intentionally left blank.
})->middleware(\App\Http\Middleware\RedirectIfAuthenticated::class);