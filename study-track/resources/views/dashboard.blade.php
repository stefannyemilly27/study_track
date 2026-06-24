<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Dashboard - StudyTrack</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

    <body>

    <h1>Seja bem-vindo(a), {{ auth()->user()->name }}!</h1>

    <p>E-mail: {{ auth()->user()->email }}</p>

    <hr>

    <h2>Menu</h2>

    <a href="{{ route('materias.index') }}">Matérias</a><br><br>
    <a href="{{ route('atividades.index') }}">Atividades</a><br><br>
    <a href="{{ route('provas.index') }}">Provas</a><br><br>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Sair</button>
    </form>

    <hr>

    <h2>Desempenho por matéria</h2>

        @if(isset($dadosGrafico) && count($dadosGrafico) > 0)

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        @foreach($dadosGrafico as $index => $item)

            @php
                $notas = $item['notas'] ?? [];

                $mediaAtual = count($notas) > 0
                    ? round(array_sum($notas) / count($notas), 2)
                    : 0;

                $melhorNota = count($notas) > 0
                    ? max($notas)
                    : 0;

                $piorNota = count($notas) > 0
                    ? min($notas)
                    : 0;

                $evolucao = "Sem dados";

                if(count($notas) >= 2){
                    $ultima = end($notas);
                    $penultima = $notas[count($notas)-2];

                    if($ultima > $penultima){
                        $evolucao = "Melhorando 📈";
                    }
                    elseif($ultima < $penultima){
                        $evolucao = "Caindo 📉";
                    }
                    else{
                        $evolucao = "Estável ➖";
                    }
                }
            @endphp

            <div class="card">

                <h3>{{ $item['materia'] }}</h3>

                <p>
                    <strong>Status:</strong>

                    @if($item['situacao'] == 'Aprovado')
                        <span class="status-aprovado">
                            {{ $item['situacao'] }}
                        </span>
                    @elseif($item['situacao'] == 'Recuperação')
                        <span class="status-recuperacao">
                            {{ $item['situacao'] }}
                        </span>
                    @else
                        <span class="status-reprovado">
                            {{ $item['situacao'] }}
                        </span>
                    @endif
                </p>

                <p><strong>Média atual:</strong> {{ $mediaAtual }}</p>

                <p><strong>Melhor nota:</strong> {{ $melhorNota }}</p>

                <p><strong>Pior nota:</strong> {{ $piorNota }}</p>

                <p><strong>Evolução:</strong> {{ $evolucao }}</p>

                <canvas id="grafico{{ $index }}"></canvas>

            </div>

        <script>
        new Chart(document.getElementById('grafico{{ $index }}'), {

            type: 'line',

            data: {
                labels: @json(range(1, count($item['notas'] ?? []))),

                datasets: [
                    {
                        label: 'Notas',
                        data: @json($item['notas'] ?? []),
                        borderWidth: 2,
                        tension: 0.3
                    },
                    {
                        label: 'Média acumulada',
                        data: @json($item['media'] ?? []),
                        borderWidth: 2,
                        tension: 0.3
                    }
                ]
            },

            options: {
                responsive: true,

                scales: {
                    y: {
                        min: 0,
                        max: 10
                    }
                }
            }
        });
        </script>

        @endforeach

        @else

        <p>Você ainda não tem provas cadastradas.</p>

        @endif

    </body>
</html>