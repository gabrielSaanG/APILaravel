<!DOCTYPE html>
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col w-screen h-screen justify-center items-center"> 
    <div class="mb-10 flex flex-col justify-center">
        <h1 class="font-semibold text-gray-800 text-2xl ">Lista de Livros</h1>
        <div class="flex gap-3 mt-2">
            <button
                class="flex flex-col justify-center rounded-2xl p-4 bg-purple-800 font-semibold  hover:bg-purple-700 transition-colors cursor-pointer">
                <a href="{{ route('livros.create') }}" class="text-white">Novo Livro</a>
            </button>
            
            <button
                class="flex flex-col justify-center rounded-2xl p-4 bg-purple-800 font-semibold  hover:bg-purple-700 transition-colors cursor-pointer">
                <a href="{{ route('autores.create') }}" class="text-white">Novo Autor</a>
            </button>
        </div>
    
    </div>
 
    <div class="flex gap-10">
        
    <div class="relative flex flex-col w-full h-full overflow-scroll bg-white shadow-md rounded-xl bg-clip-border">
         <table border="1" class="w-full text-left min-w-max  max-h-[85vh] overflow-y-auto  space table-auto" >
            <thead>
                <tr >
                    <th class="text-purple-800/75   p-4 border-b border-purple-100 bg-slate-200 ">Título</th>
                    <th class="text-purple-800/75 p-4 border-b border-purple-100 bg-slate-200 ">Autor</th>
                    <th class="text-purple-800/75 p-4 border-b border-purple-100 bg-slate-200 ">Gênero</th>
                    <th class="text-purple-800/75 p-4 border-b border-purple-100 bg-slate-200 ">Ano</th>
                    <th class="text-purple-800/75 p-4 border-b border-purple-100 bg-slate-200 ">Editora</th>
                    <th class="text-purple-800/75 p-4 border-b border-purple-100 bg-slate-200 ">Ações</th>
                </tr>     
            </thead>
           
            @foreach ($livros as $livro)
                                <tr>
                                    <td class="p-4 border-b border-gray-100">
                                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{ $livro->titulo }}</p>
                                    </td>
                                    <td class="p-4 border-b border-gray-100">
                                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{ $livro->autor->nome }}</p>
                                    </td>
                                    <td class="p-4 border-b border-gray-100">
                                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{ $livro->genero }}</p>
                                    </td>
                                    <td class="p-4 border-b border-gray-100">
                                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{ $livro->ano }}</p>
                                    </td>
                                    <td class="p-4 border-b border-gray-100">
                                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">{{ $livro->editora }}</p>
                                    </td>
                                    <td class="p-4 border-b border-gray-100 flex  items-center space-x-2"> 
                                        <a href="#" onCLick='openModal(@json($livro))' class="p-4 bg-blue-500 rounded-xl hover:bg-blue-600 transition-colors cursor-pointer">
                                            <svg class="w-6 h-6 text-slate-50 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('livros.destroy', $livro) }}" method="POST" style="display:inline;">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="p-4 bg-red-500 rounded-xl hover:bg-red-600 transition-colors cursor-pointer">
                                                <svg class="w-6 h-6 text-slate-50 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
            @endforeach
    </table>
   
    </div>
    
    
    </div>
    
    <div id="editModal" class="fixed inset-0 hidden items-center justify-center bg-black/10 z-50">
        <div class="bg-slate-200 p-6 rounded-2xl shadow-2xl w-[400px] relative">
            <h2 class="text-xl font-semibold text-purple-800 mb-4">Editar Livro</h2>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                <input type="text" name="titulo" id="tituloInput" placeholder="Título"
                    class="w-full p-2 mb-2 rounded bg-white text-gray-600" />
                <input type="text" name="genero" id="generoInput" placeholder="Gênero"
                    class="w-full p-2 mb-2 rounded bg-white text-gray-600" />
                <input type="number" name="ano" id="anoInput" placeholder="Ano" class="w-full p-2 mb-2 rounded bg-white text-gray-600" />
                <input type="text" name="editora" id="editoraInput" placeholder="Editora"
                    class="w-full p-2 mb-2 rounded bg-white text-gray-600" />
                <div class="flex justify-end gap-2 mt-4">
                    <button type="button" onclick="closeModal()"
                        class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400 transition-colors  cursor-pointer">Cancelar</button>
                    <button type="submit"
                        class="bg-purple-700 text-white px-4 py-2 rounded hover:bg-purple-800 cursor-pointer transition-colors">Salvar</button>
                </div>
            </form>
        </div>
    </div>

</body>

