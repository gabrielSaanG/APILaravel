<!DOCTYPE html>
<html>
<head>
    <title>Biblioteca - Laravel</title>

    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex flex-col h-screen text-2xl justify-center items-center">
         <h1>Bem-vindo à <span class="font-bold text-gray-800">Biblioteca</span></h1>
    <a href="{{ route('livros.index') }}" class="text-purple-800 font-semibold hover:scale-105 hover:text-purple-700 transition-all">Ver Perfil</a>
    </div>
   
</body>
</html>