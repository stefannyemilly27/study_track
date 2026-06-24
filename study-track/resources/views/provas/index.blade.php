<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Provas</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>

    <h1>Provas</h1>

    <a href="{{ route('provas.create') }}">+ Criar Prova</a>

    <hr>

    @foreach($provas as $prova)

        <p>
            <strong>{{ $prova->titulo }}</strong><br>
            Nota: {{ $prova->nota }}<br>
            Data: {{ $prova->data_prova }}<br>
            Matéria: {{ $prova->materia->nome ?? 'Sem matéria' }}
        </p>

        <form action="{{ route('provas.destroy', $prova->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Excluir</button>
        </form>

        <hr>

    @endforeach

        <a href="{{ route('dashboard') }}">⬅ Voltar</a>

    </body>
</html>