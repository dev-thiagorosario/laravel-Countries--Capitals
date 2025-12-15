<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Crypt;

trait DecryptAnswerTrait
{
    protected function decryptAnswer (
        string $encryptedAnswer,
        string $redirectRoute = 'game'
    ): string|RedirectResponse{
        try {
            $answer = Crypt::decryptString($encryptedAnswer);
            return $answer;
        }catch (\Throwable) {
            return redirect()->route($redirectRoute);
        }
    }

}
