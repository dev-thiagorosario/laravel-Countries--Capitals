<x-main-layout-component pageTitle="Country Capitals Quiz">
    @php
        $scoreClass = $percentage >= 70
            ? 'text-success'
            : ($percentage >= 40 ? 'text-warning' : 'text-danger');
    @endphp

    <div class="container">

        <div class="text-center fs-2 mb-4">
            <p class="text-info mb-1">RESULTADOS FINAIS</p>
            <p class="fs-4 text-muted">Confira como foi o seu desempenho.</p>
        </div>

        <div class="row fs-4 mb-2">
            <div class="col text-end">Total de questões:</div>
            <div class="col text-info">{{ $total_questions }}</div>
        </div>
        <div class="row fs-4 mb-2">
            <div class="col text-end">Respostas certas:</div>
            <div class="col text-success">{{ $correct_answers }}</div>
        </div>
        <div class="row fs-4 mb-4">
            <div class="col text-end">Respostas erradas:</div>
            <div class="col text-danger">{{ $wrong_answers }}</div>
        </div>
        <div class="row fs-1 mb-3">
            <div class="col text-end">Score final:</div>
            <div class="col {{ $scoreClass }}">{{ number_format($percentage, 2) }}%</div>
        </div>

    </div>

    <div class="text-center mt-5">
        <a href="{{ route('start-game') }}" class="btn btn-primary mt-3 px-5">VOLTAR AO INÍCIO</a>
    </div>
</x-main-layout-component>
