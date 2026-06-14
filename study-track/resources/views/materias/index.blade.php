<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Matérias</title>
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

    <h1>Matérias</h1>

    <a href="{{ route('materias.create') }}">
        Nova Matéria
    </a>

    <hr>

    @foreach($materias as $materia)

        <div>

            <h2>{{ $materia->nome }}</h2>

            <p>Professor: {{ $materia->professor }}</p>

            <p>{{ $materia->descricao }}</p>

            <a href="{{ route('materias.edit', $materia->id) }}">
                Editar
            </a>

            <form action="{{ route('materias.destroy', $materia->id) }}" method="POST">

                @csrf
                @method('DELETE')

                <button type="submit">
                    Excluir
                </button>

            </form>

        </div>

        <hr>

        <button type="button" onclick="history.back()">Voltar</button>

    @endforeach

</body>
</html>