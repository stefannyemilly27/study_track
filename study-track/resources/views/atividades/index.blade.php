<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Atividades</title>
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

    <h1>Atividades</h1>

    <a href="{{ route('atividades.create') }}">
        Nova Atividade
    </a>

    <hr>

    @foreach($atividades as $atividade)

        <h3>{{ $atividade->titulo }}</h3>

        <p>
            <strong>Status:</strong>
            {{ $atividade->status }}
        </p>

        <p>
            <strong>Entrega:</strong>
            {{ $atividade->data_entrega }}
        </p>

        <p>
            <strong>Matéria:</strong>
            {{ $atividade->materia->nome }}
        </p>

        <a href="{{ route('atividades.edit', $atividade) }}">
            Editar
        </a>

        <form
            action="{{ route('atividades.destroy', $atividade) }}"
            method="POST"
        >
            @csrf
            @method('DELETE')

            <button type="submit">
                Excluir
            </button>
        </form>

        <hr>

        <a href="{{ route('dashboard') }}">
            ⬅ Voltar
        </a>

    @endforeach

</body>
</html>