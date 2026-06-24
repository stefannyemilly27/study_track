<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - StudyTrack</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="auth-container">

        <div class="auth-card">

            <h1>📚 StudyTrack</h1>

            <h2>Login</h2>

            @if(session('success'))
                <div class="alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('status'))
                <div class="alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">

                @csrf

                <div class="form-group">

                    <label for="email">
                        E-mail
                    </label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                    >

                    @error('email')
                        <p>{{ $message }}</p>
                    @enderror

                </div>

                <div class="form-group">

                    <label for="password">
                        Senha
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                    >

                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror

                </div>

                <button type="submit">
                    Entrar
                </button>

            </form>

            <br>

            <a href="{{ route('register') }}">
                Criar uma conta
            </a>

        </div>

    </div>

</body>

</html>