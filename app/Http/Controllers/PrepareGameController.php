<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\PrepareGameRequest;
use App\Services\PrepareQuizService;
use Illuminate\Contracts\View\View;

class PrepareGameController extends Controller
{
    public function __construct(
        private readonly PrepareQuizService $prepareQuiz
    ) {
    }

    public function __invoke(PrepareGameRequest $request): View
    {
        $totalQuestions = $request->integer('total_questions');
        $quiz = $this->prepareQuiz->make($totalQuestions);

        return view('home', [
            'quiz' => $quiz,
            'total_questions' => $totalQuestions,
        ]);
    }
}
