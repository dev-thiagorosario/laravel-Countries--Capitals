<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ShowResultsController extends Controller
{
    public function __invoke(): View|RedirectResponse
    {
        $totalQuestions = session('total_questions');
        $correctAnswers = session('correct_answers');
        $wrongAnswers = session('wrong_answers');
        $percentage = $totalQuestions > 0
            ? round(($correctAnswers / $totalQuestions) * 100, 2)
            : 0;

        return view('final_results', [
            'correct_answers' => $correctAnswers,
            'wrong_answers' => $wrongAnswers,
            'total_questions' => $totalQuestions,
            'percentage' => $percentage,
        ]);
    }
}
