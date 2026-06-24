<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <title>Criar Matéria</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>

    <body>

        <h1>Criar Matéria</h1>

        <form action="{{ route('materias.store') }}" method="POST">

            @csrf

            <div>
                <label>Nome</label>
                <input type="text" name="nome">
            </div>

            <br>

            <div>
                <label>Professor</label>
                <input type="text" name="professor">
            </div>

            <br>

            <div>
                <label>Descrição</label>
                <textarea name="descricao"></textarea>
            </div>

            <br>

            <br>

            <button type="submit">Salvar</button>

            <br>

            <br>

            <a href="{{ route('dashboard') }}">⬅ Voltar</a>

        </form>

    </body>
</html>