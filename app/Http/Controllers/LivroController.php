<?php

namespace App\Http\Controllers;
use App\Models\Livro;
use Illuminate\Http\Request;
use App\Models\Autor;

class LivroController extends Controller
{
    public function index() {
        $livros = Livro::with('autor')->get();
        return view('livros.index', compact('livros'));
    }

    public function create() {
        $autores = Autor::all();
        return view('livros.create', compact('autores'));
    }

    public function store(Request $request) {

        Livro::create([
            'titulo'  => $request-> titulo,
            'autor_id' => $request->autor_id,
            'ano' => $request->ano,
            'editora' => $request->editora,
            'genero' => $request->genero,
        ]
            
        );
        return redirect()->route('livros.index');
    }

    public function edit(Livro $livro) {
        $autores = Autor::all();
        return view('livros.edit', compact('livro', 'autores'));
    }

    public function update(Request $request, Livro $livro) {
        $livro->update($request->all());
        return redirect()->route('livros.index');
    }

    public function destroy(Livro $livro) {
        $livro->delete();
        return redirect()->route('livros.index');
    }
}

