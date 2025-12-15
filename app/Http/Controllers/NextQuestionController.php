<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

final class NextQuestionController extends Controller
{
    public function __invoke(): RedirectResponse
    {
        $currentQuestion = (int) session('current_question', 0);
        $totalQuestions  = (int) session('total_questions', 0);

        if ($currentQuestion + 1 < $totalQuestions) {
            session()->put('current_question', $currentQuestion + 1);

            return redirect()->route('game');
        }
        
        return redirect()->route('show_results');
    }
}
