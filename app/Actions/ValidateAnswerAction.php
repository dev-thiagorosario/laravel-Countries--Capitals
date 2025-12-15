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
        $correctAnswers = (int) session('correct_answers', 0);
        $wrongAnswers = (int) session('wrong_answers', 0);

        $isCorrect = strcasecmp($answer, $correctAnswer) === 0;

        if ($isCorrect) {
            $correctAnswers++;
        } else {
            $wrongAnswers++;
        }

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
