<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\ValidateAnswerAction;
use App\Traits\DecryptAnswerTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AnswerController extends Controller
{
    use DecryptAnswerTrait;
    public function __invoke(string $encryptedAnswer, ValidateAnswerAction $validateAnswerAction): View|RedirectResponse
    {
        $answer = $this->decryptAnswer($encryptedAnswer, 'game');
        if ($answer instanceof RedirectResponse) {
            return $answer;
        }

        $data = $validateAnswerAction($answer);

        return view('answer_result', $data);
    }
}
