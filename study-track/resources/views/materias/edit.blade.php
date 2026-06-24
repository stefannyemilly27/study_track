<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <title>Editar Matéria</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>

    <body>

        <h1>Editar Matéria</h1>

        <form action="{{ route('materias.update', $materia->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div>
                <label>Nome</label>

                <input
                    type="text"
                    name="nome"
                    value="{{ $materia->nome }}"
                >
            </div>

            <br>

            <div>
                <label>Professor</label>

                <input
                    type="text"
                    name="professor"
                    value="{{ $materia->professor }}"
                >
            </div>

            <br>

            <div>
                <label>Descrição</label>

                <textarea name="descricao">{{ $materia->descricao }}</textarea>
            </div>

            <br>

            <div>
                <label>Cor</label>

                <input
                    type="color"
                    name="cor"
                    value="{{ $materia->cor }}"
                >
            </div>

            <br>

            <button type="submit">Atualizar</button>

            <a href="{{ route('materias.index') }}">Cancelar</a>

        </form>

    </body>
</html>