<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Testamento extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];


    /**
     * Pegar todos os livros vinculados
    */

    public function livros()
    {
        return $this->hasMany(Livro::class);
    }
}
