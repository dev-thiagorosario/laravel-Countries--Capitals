<x-main-layout-component page-title="Countries & Capitals Quiz">

    <div class="container">

        <x-question-component :country="$country" :current-question="$current_question" :total-questions="$total_questions" ></x-question-component>

        <div class="text-center fs-3 mb-3">
            Resposta correta: <span class="text-info">{{ $correct_answer ?? 'Indisponível' }}</span>
        </div>

        @php
            $choiceIsCorrect = isset($choice_answer, $correct_answer) && $choice_answer === $correct_answer;
        @endphp

        <div class="text-center fs-3 mb-3">
            A sua resposta:
            <span class="{{ $choiceIsCorrect ? 'text-success' : 'text-danger' }}">
                {{ $choice_answer ?? 'Indisponível' }}
            </span>
        </div>

    </div>

    <!-- cancel game -->
    <div class="text-center mt-5">
        <a href="{{ route('game') }}" class="btn btn-primary mt-3 px-5">AVANÇAR</a>
    </div>

</x-main-layout-component>
