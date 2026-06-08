<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Matérias</title>
</head>

<body>

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

    @endforeach

</body>
</html>