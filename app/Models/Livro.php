<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $fillable = ['titulo', 'autor_id', 'genero', 'ano', 'editora'];


    public function autor(){
        return $this->belongsTo(Autor::class);
    }
}
