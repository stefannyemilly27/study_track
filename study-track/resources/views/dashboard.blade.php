<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Dashboard - StudyTrack</title>
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

        <h3>{{ $item['materia'] }}</h3>

        <p><strong>Status:</strong> {{ $item['status'] }}</p>

        <canvas id="grafico{{ $index }}"></canvas>

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
                            fill: false
                        },
                        {
                            label: 'Média acumulada',
                            data: @json($item['media'] ?? []),
                            borderWidth: 2,
                            fill: false
                        }
                    ]
                },

                options: {
                    scales: {
                        y: {
                            ticks: {
                                callback: function(value) {
                                    return Number(value).toFixed(2);
                                }
                            }
                        }
                    }
                }
            });
        </script>

        <hr>

    @endforeach

@else
    <p>Você ainda não tem provas cadastradas.</p>
@endif

</body>
</html>