<?php

declare(strict_types=1);

namespace App\Actions;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

final class ShowGameAction
{
     public function __invoke(): View|RedirectResponse
     {
         $quiz = session('quiz');
         $totalQuestions = session('total_questions');
         $currentQuestion = session('current_question');

         if (!is_array($quiz) || empty($quiz) || !is_int($totalQuestions) || !is_int($currentQuestion)) {
             return $this->redirectToStart('Sua sessão expirou ou o jogo não foi iniciado. Comece novamente.');
         }

        $index = $currentQuestion - 1;
        $question = $quiz[$index];

         $answers = $question['wrong_answers'];
         $answers[] = $question['correct_answer'];
         shuffle($answers);

         return view('game', [
             'country' => $question['country'],
             'total_questions' => $totalQuestions,
             'current_question' => $currentQuestion,
             'answers' => $answers,
         ]);
     }
     private function redirectToStart(string $message): RedirectResponse
     {
         return redirect()->route('start-game')->with('message', $message);
     }
}
