<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Dashboard - StudyTrack</title>
</head>

<body>

    <h1>StudyTrack</h1>

    <h2>Menu Principal</h2>

    <hr>

    <a href="{{ route('materias.index') }}">
        Gerenciar Matérias
    </a>

    <br><br>

    <a href="#">
        Gerenciar Atividades
    </a>

    <br><br>

    <a href="#">
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
