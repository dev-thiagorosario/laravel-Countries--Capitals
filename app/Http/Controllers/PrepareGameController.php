<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\PrepareGameRequest;
use App\Services\PrepareQuizService;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PrepareGameController extends Controller
{
    public function __construct(
        private readonly PrepareQuizService $prepareQuiz
    ) {
    }

    public function __invoke(PrepareGameRequest $request): RedirectResponse
    {
        $totalQuestions = $request->integer('total_questions');
        $quiz = $this->prepareQuiz->make($totalQuestions);

        session()->put([
            'quiz' => $quiz,
            'total_questions' => $totalQuestions,
            'current_question' => 1,
            'correct_answers' => 0,
            'wrong_answers' => 0,
        ]);

        return redirect()->route('game');
    }
}
