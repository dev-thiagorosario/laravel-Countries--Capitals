<?php

namespace App\Http\Controllers;

use App\Actions\ShowGameAction;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GameController extends Controller
{
    public function __invoke(ShowGameAction $showGameAction): View|RedirectResponse
    {
       return $showGameAction();
    }
}
