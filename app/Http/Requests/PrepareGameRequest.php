<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrepareGameRequest extends FormRequest
{
    public function rules()
    {
        return [
            'total_questions' => 'required|integer|min:3|max:30',
        ];
    }

    public function messages(): array
    {
        return [
            'total_questions.required' => 'O número de questões é obrigatório',
            'total_questions.integer' => 'O número de questões deve ser um número inteiro',
            'total_questions.min' => 'O número de questões deve ser maior que 3',
            'total_questions.max' => 'O número de questões deve ser menor que 30',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
