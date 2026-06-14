<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login - StudyTrack</title>
</head>

<body>

    <h1>StudyTrack</h1>

    <h2>Login</h2>

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

    @if(session('status'))

        <div>
            {{ session('status') }}
        </div>

    @endif

    <form method="POST" action="{{ route('login') }}">

        @csrf

        <div>
            <label for="email">
                E-mail
            </label>

            <br>

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

        <br>

        <div>
            <label for="password">
                Senha
            </label>

            <br>

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

        <br>

        <div>

            <input
                type="checkbox"
                id="remember"
                name="remember"
            >

            <label for="remember">
                Lembrar de mim
            </label>

        </div>

        <br>

        @if (Route::has('password.request'))

            <a href="{{ route('password.request') }}">
                Esqueceu sua senha?
            </a>

            <br><br>

        @endif

        <button type="submit">Entrar</button>

    </form>

</body>

</html>