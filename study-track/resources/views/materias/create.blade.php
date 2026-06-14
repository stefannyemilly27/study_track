<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Criar Matéria</title>
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

        <div>
            <label>Cor</label>
            <input type="color" name="cor">
        </div>

        <br>

        <button type="submit">Salvar</button>

        <button type="button" onclick="history.back()">Voltar</button>

    </form>

</body>
</html>