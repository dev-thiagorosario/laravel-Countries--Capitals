<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\PrepareGameController;
use App\Http\Controllers\ShowResultsController;
use App\Http\Controllers\StartGameController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\NextQuestionController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/home');

Route::get('/home', StartGameController::class)->name('start-game');
Route::post('/home', PrepareGameController::class)->name('prepare-game');

Route::get('/game', GameController::class)->name('game');
Route::get('/answer/{answer}', AnswerController::class)->name('answer');
Route::get('/next-question', NextQuestionController::class)->name('next_question');
Route::get('/show_results', ShowResultsController::class)->name('show_results');
