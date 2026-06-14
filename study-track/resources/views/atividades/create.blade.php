<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Criar Atividade</title>
</head>

<body>

    <h1>Criar Atividade</h1>

    <form action="{{ route('atividades.store') }}" method="POST">

        @csrf

        <div>
            <label>Título</label>
            <input type="text" name="titulo">
        </div>

        <br>

        <div>
            <label>Descrição</label>
            <textarea name="descricao"></textarea>
        </div>

        <br>

        <div>
            <label>Data de Entrega</label>
            <input type="date" name="data_entrega">
        </div>

        <br>

        <div>
            <label>Status</label>

            <select name="status">
                <option value="Pendente">Pendente</option>
                <option value="Em andamento">Em andamento</option>
                <option value="Concluída">Concluída</option>
            </select>
        </div>

        <br>

        <div>
            <label>Matéria</label>

            <select name="materia_id">

                @foreach($materias as $materia)

                    <option value="{{ $materia->id }}">
                        {{ $materia->nome }}
                    </option>

                @endforeach

            </select>
        </div>

        <br>

        <button type="submit">Salvar</button>

        <button type="button" onclick="history.back()">Voltar</button>

    </form>

</body>
</html>