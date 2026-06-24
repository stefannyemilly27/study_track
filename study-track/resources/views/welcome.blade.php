<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyTrack</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="welcome-container">

        <h1>StudyTrack</h1>

        <p>
            Organize suas matérias, atividades, provas e acompanhe seu desempenho escolar.
        </p>

        <div class="welcome-buttons">

            @auth

                <a href="{{ route('dashboard') }}">
                    Entrar no Sistema
                </a>

            @else

                <a href="{{ route('login') }}">
                    Login
                </a>

                <a href="{{ route('register') }}">
                    Cadastrar
                </a>

            @endauth

        </div>

    </div>

</body>

</html>