<!DOCTYPE html>
<html>
    <head>
        <title>Editar Prova</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    <body>

    <h1>Editar Prova</h1>

    <form action="{{ route('provas.update', $prova->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="titulo" value="{{ $prova->titulo }}"><br><br>

        <input type="number" step="0.1" name="nota" value="{{ $prova->nota }}"><br><br>

        <input type="date" name="data_prova" value="{{ $prova->data_prova }}"><br><br>

        <input type="number" name="materia_id" value="{{ $prova->materia_id }}"><br><br>

        <button type="submit">Atualizar</button>
    </form>

    </body>
</html>