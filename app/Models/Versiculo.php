<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Versiculo extends Model
{
    use HasFactory;

    protected $fillable = ['capitulo', 'versiculo', 'texto', 'livro_id'];

    /**
     *  Pega o livro
     */

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }
}
