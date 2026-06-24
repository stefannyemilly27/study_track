<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Provas</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>

        @if(session('success'))

            <div style="
                background: #d4edda;
                color: #155724;
                padding: 10px;
                margin-bottom: 15px;
                border-radius: 5px;
            ">
                {{ session('success') }}
            </div>

        @endif
        
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

        <a href="{{ route('provas.edit', $prova->id) }}">Editar</a>

        <form action="{{ route('provas.destroy', $prova->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Excluir</button>
        </form>

        <hr>

    @endforeach

    </body>
    <a href="{{ route('dashboard') }}">⬅ Voltar</a>
</html>