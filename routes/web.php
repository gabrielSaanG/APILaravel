<?php

use App\Http\Controllers\AutorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;

Route::resource('livros', LivroController::class);

Route::resource('autores', AutorController::class);

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/perfil', [LivroController::class,'index'])->name('livros.index');

Route::get('/criar_livro', [LivroController::class,'create'])->name('livros.create');

Route::get('/criar_autores', [AutorController::class,'create'])->name('autores.create');