@props([
    'country' => '',
    'currentQuestion' => 0,
    'totalQuestions' => 0,
])

<div class="text-center mb-4">
    <p class="fs-4 mb-1">
        Pergunta <span class="fw-bold text-info">{{ $currentQuestion }}</span>
        de <span class="fw-bold">{{ $totalQuestions }}</span>
    </p>
    <p class="fs-3 mb-0">
        Qual é a capital de <span class="fw-semibold">{{ $country }}</span>?
    </p>
</div>
