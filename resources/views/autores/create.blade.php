<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Autor</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>
<body class="flex flex-col justify-center items-center w-screen h-screen">

    <h1 class="font-semibold text-purple-800 text-2xl">Cadastrar Novo Autor</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mt-10 p-10 w-[40%] rounded-2xl shadow-md bg-gray-200">
        <button class="w-fit mb-10 text-2xl bg-purple-800 hover:bg-purple-700 transition-colors cursor-pointer px-4 rounded font-semibold text-white" onClick="window.location.href='{{ route('livros.index') }}'">
            <i class='fas fa-angle-left' ></i>
        </button>
    

        <form method="POST" action="{{ route('autores.store') }} " class="">
                @csrf

                <label for="nome" class="font-semibold">Nome do Autor:</label><br>
                <input type="text" name="nome" id="nome" value="{{ old('nome') }}" class="p-2 bg-gray-50 w-full rounded" required><br><br>

                <button type="submit" class="p-4 rounded-2xl bg-purple-800 text-white font-semibold hover:bg-purple-700 transition-colors cursor-pointer">Salvar</button>
                
                <button class="p-4 rounded-2xl bg-red-400 text-white font-semibold hover:bg-red-500 transition-colors cursor-pointer">
                    <a href="{{ route('autores.index') }}">Cancelar</a>
                </button>
                
        </form>

    </div>

    
</body>
</html>