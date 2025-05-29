<head>
   @vite(['resources/css/app.css', 'resources/js/createAutor.js'])
   <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>

<body class="flex flex-col justify-center items-center w-screen h-screen">
    

    <div class="font-semibold text-2xl text-purple-800">
        <h1>Adicionar Novo Livro</h1>
    </div>
    <div class="mt-10 p-10 w-[40%] rounded-2xl shadow-md bg-gray-200">
        <button class="w-fit mb-10 text-2xl bg-purple-800 hover:bg-purple-700 transition-colors cursor-pointer p-4 rounded font-semibold text-white" onClick="window.location.href='{{ route('livros.index') }}'">
            <i class='fas fa-angle-left' ></i>
        </button>
        <form method="POST" action="{{ route('livros.store') }}" class="flex flex-col gap-4">
            @csrf
            <input name="titulo" placeholder="Título" class="bg-gray-50 p-2 rounded" required><br>
            <div class="w-full mb-4">
                <p class="font-semibold text-purple-800">Selecionar autor</p>
                <select name="autor_id" class="rounded p-2 bg-gray-50 w-full cursor-pointer" required>
                    @foreach ($autores as $autor)
                        <option value="{{ $autor->id }}">{{ $autor->nome }}</option>
                    @endforeach
                </select>
                <button class="p-2 rounded mt-4 bg-purple-800 text-white font-semibold cursor-pointer hover:bg-purple-700 transition-colors">
                    <a  href="{{ route('autores.create') }}">Criar novo autor</a>
                </button>
            </div>
            
            

            <input name="genero" placeholder="Gênero" class="bg-gray-50 p-2 rounded" required><br>
            <input name="ano" placeholder="Ano" type="number" class="bg-gray-50 p-2 rounded" required><br>
            <input name="editora" placeholder="Editora" class="bg-gray-50 p-2 rounded" required><br>
            <button type="submit" class="p-4 rounded-2xl bg-purple-800 text-white font-semibold cursor-pointer hover:bg-purple-700 transition-colors">Salvar</button>
        </form>
    </div>
</body>

