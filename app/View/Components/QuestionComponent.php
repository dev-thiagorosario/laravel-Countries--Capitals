<?php

declare(strict_types=1);

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class QuestionComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public readonly string $country,
        public readonly int $currentQuestion,
        public readonly int $totalQuestions
    ){}
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.question');
    }
}
