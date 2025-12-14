<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Collection;

final class PrepareQuizService
{
    /**
     * Build a randomized set of quiz questions.
     *
     * @return array<int, array<string, mixed>>
     */
    public function make(int $totalQuestions): array
    {
        $countries = $this->loadCountries();
        $capitals = $countries->pluck('capital')->all();

        return $this
            ->pickCountries($countries, $totalQuestions)
            ->values()
            ->map(
                fn (array $country, int $index) => $this->buildQuestion(
                    country: $country,
                    questionNumber: $index + 1,
                    allCapitals: $capitals,
                )
            )
            ->all();
    }

    private function loadCountries(): Collection
    {
        return collect(config('app_data'))
            ->filter(fn (?array $entry) => !empty($entry['country']) && !empty($entry['capital']))
            ->values();
    }

    private function pickCountries(Collection $countries, int $totalQuestions): Collection
    {
        return $countries
            ->shuffle()
            ->take(min($totalQuestions, $countries->count()));
    }

    /**
     * @param array<string, string> $country
     * @param array<int, string> $allCapitals
     *
     * @return array<string, mixed>
     */
    private function buildQuestion(array $country, int $questionNumber, array $allCapitals): array
    {
        $correctAnswer = (string) $country['capital'];

        $wrongAnswers = collect($allCapitals)
            ->reject(fn (string $capital) => $capital === $correctAnswer)
            ->shuffle()
            ->take(3)
            ->values()
            ->all();

        return [
            'question_number' => $questionNumber,
            'country' => (string) $country['country'],
            'correct_answer' => $correctAnswer,
            'wrong_answers' => $wrongAnswers,
            'correct' => null,
        ];
    }
}
