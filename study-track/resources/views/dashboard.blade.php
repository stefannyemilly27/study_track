<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Dashboard - StudyTrack</title>
</head>

<body>

    <h1>
        Seja bem-vindo(a), {{ auth()->user()->name }}!
    </h1>

    <p>
        Que bom ter você de volta ao StudyTrack.
    </p>

    <p>
        E-mail: {{ auth()->user()->email }}
    </p>

    <hr>

    <h1>StudyTrack</h1>

    <h2>Menu Principal</h2>

    <hr>

    <a href="{{ route('materias.index') }}">
        Gerenciar Matérias
    </a>

    <br><br>

    <a href="{{ route('atividades.index') }}">
        Gerenciar Atividades
    </a>

    <br><br>

    <a href="{{ route('provas.index') }}">
        Gerenciar Provas
    </a>

    <br><br>

    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <button type="submit">
            Sair
        </button>
    </form>

</body>

</html>