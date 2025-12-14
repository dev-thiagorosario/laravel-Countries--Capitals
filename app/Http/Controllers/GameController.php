<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class GameController extends Controller
{
    public function __invoke(): View
    {
        $quiz = session('quiz');
        $total_questions = session('total_questions');
        $current_question = session('current_question') - 1;

        $answers = $quiz[$current_question]['wrong_answers'];
        $answers[] = $quiz[$current_question]['correct_answer'];
        shuffle($answers);

        return view('game')->with([
            'conutry' => $quiz[$current_question]['country'],
            'total_questions' => $total_questions,
            'current_question' => $current_question + 1,
            'answers' => $answers
        ]);
    }
}
