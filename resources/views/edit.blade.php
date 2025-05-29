<h1>Editar Livro</h1>
<form method="POST" action="{{ route('livros.update', $livro) }}">
    @csrf @method('PUT')
    <input name="titulo" value="{{ $livro->titulo }}"><br>
    <select name="autor_id">
        @foreach ($autores as $autor)
            <option value="{{ $autor->id }}">{{ $autor->nome }}</option>
        @endforeach
    </select>
    <input name="genero" value="{{ $livro->genero }}"><br>
    <input name="ano" value="{{ $livro->ano }}"><br>
    <input name="editora" value="{{ $livro->editora }}"><br>
    <button type="submit">Atualizar</button>
</form>
