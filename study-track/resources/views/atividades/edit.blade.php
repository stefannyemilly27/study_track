<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Atividade</title>
</head>

<body>

    <h1>Editar Atividade</h1>

    <form
        action="{{ route('atividades.update', $atividade) }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <div>
            <label>Título</label>

            <input
                type="text"
                name="titulo"
                value="{{ $atividade->titulo }}"
            >
        </div>

        <br>

        <div>
            <label>Descrição</label>

            <textarea name="descricao">{{ $atividade->descricao }}</textarea>
        </div>

        <br>

        <div>
            <label>Data de Entrega</label>

            <input
                type="date"
                name="data_entrega"
                value="{{ $atividade->data_entrega }}"
            >
        </div>

        <br>

        <div>
            <label>Status</label>

            <select name="status">

                <option
                    value="Pendente"
                    {{ $atividade->status == 'Pendente' ? 'selected' : '' }}
                >
                    Pendente
                </option>

                <option
                    value="Em andamento"
                    {{ $atividade->status == 'Em andamento' ? 'selected' : '' }}
                >
                    Em andamento
                </option>

                <option
                    value="Concluída"
                    {{ $atividade->status == 'Concluída' ? 'selected' : '' }}
                >
                    Concluída
                </option>

            </select>
        </div>

        <br>

        <div>
            <label>Matéria</label>

            <select name="materia_id">

                @foreach($materias as $materia)

                    <option
                        value="{{ $materia->id }}"
                        {{ $atividade->materia_id == $materia->id ? 'selected' : '' }}
                    >
                        {{ $materia->nome }}
                    </option>

                @endforeach

            </select>

        </div>

        <br>

        <button type="submit">Atualizar</button>

        <button type="button" onclick="history.back()">Voltar</button>

    </form>

</body>
</html>