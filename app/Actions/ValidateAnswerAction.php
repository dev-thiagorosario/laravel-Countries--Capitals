<?php

declare(strict_types=1);

namespace App\Actions;

final class ValidateAnswerAction
{
    public function __invoke(string $answer): array
    {
        $quiz = session('quiz');
        $currentQuestion = (int) session('current_question');
        $questionIndex = max($currentQuestion - 1, 0);
        $questionData = $quiz[$questionIndex] ?? [];
        $correctAnswer = $questionData['correct_answer'] ?? '';
        $correctAnswers = session('correct_answers');
        $wrongAnswers = session('wrong_answers');

        session()->put([
            'quiz' => $quiz,
            'correct_answers' => $correctAnswers,
            'wrong_answers' => $wrongAnswers,
        ]);

        return [
            'country' => $questionData['country'] ?? '',
            'correct_answer' => $correctAnswer,
            'choice_answer' => $answer,
            'current_question' => $currentQuestion,
            'total_questions' => session('total_questions'),
        ];
    }
}
