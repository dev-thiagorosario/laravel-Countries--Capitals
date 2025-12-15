<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\PrepareGameController;
use App\Http\Controllers\StartGameController;
use App\Http\Controllers\AnswerController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/home');

Route::get('/home', StartGameController::class)->name('start-game');
Route::post('/home', PrepareGameController::class)->name('prepare-game');

Route::get('/game', GameController::class)->name('game');
Route::get('/answer/{answer}', AnswerController::class)->name('answer');
