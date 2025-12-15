<x-main-layout-component pageTitle="Country Capitals Quiz">

 <div class="container">

     <x-question-component :country="$country" :current-question="$current_question" :total-questions="$total_questions" ></x-question-component>
        <div class="border border-primary rounded-5 p-3 text-center fs-3 mb-3">
            Pergunta: <span class="text-info fw-bolder">{{ $current_question }} / {{ $total_questions }}</span>
        </div>

        <div class="row">

            @forelse(($answers ?? []) as $answer)
                <x-answer-component :capital="$answer"></x-answer-component>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted mb-0">As respostas não estão disponíveis. Reinicie o jogo.</p>
                </div>
            @endforelse

        </div>

    </div>

    <!-- cancel game -->
    <div class="text-center mt-5">
        <a href="#" class="btn btn-outline-danger mt-3 px-5">CANCELAR JOGO</a>
    </div>

</x-main-layout-component>
