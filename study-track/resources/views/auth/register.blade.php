<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - StudyTrack</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="auth-container">

        <div class="auth-card">

            <h1>📚 StudyTrack</h1>

            <h2>Criar Conta</h2>

            <form method="POST" action="{{ route('register') }}">

                @csrf

                <div class="form-group">

                    <label for="name">
                        Nome
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autofocus
                    >

                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror

                </div>

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

                <div class="form-group">

                    <label for="password_confirmation">
                        Confirmar Senha
                    </label>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        required
                    >

                    @error('password_confirmation')
                        <p>{{ $message }}</p>
                    @enderror

                </div>

                <button type="submit">
                    Cadastrar
                </button>

            </form>

            <br>

            <a href="{{ route('login') }}">
                Já possui uma conta? Entrar
            </a>

        </div>

    </div>

</body>

</html>