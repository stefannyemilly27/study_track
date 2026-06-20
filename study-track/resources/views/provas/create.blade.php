<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Criar Prova</title>
</head>

<body>

<h1>Criar Prova</h1>

<form action="{{ route('provas.store') }}" method="POST">
    @csrf

    <label>Título</label><br>
    <input type="text" name="titulo" required><br><br>

    <label>Nota</label><br>
    <input type="number" step="0.01" min="0" max="10" name="nota" required><br><br>

    <label>Data da Prova</label><br>
    <input type="date" name="data_prova" required><br><br>

    <label>Matéria</label><br>
    <select name="materia_id" required>
        <option value="">Selecione uma matéria</option>

        @foreach($materias as $materia)
            <option value="{{ $materia->id }}">
                {{ $materia->nome }}
            </option>
        @endforeach

    </select>

    <br><br>

    <button type="submit">Salvar Prova</button>
</form>

<br>

<a href="{{ route('dashboard') }}">⬅ Voltar</a>

</body>

</html>