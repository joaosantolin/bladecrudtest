<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    // Nome da tabela no banco (opcional, mas bom garantir)
    protected $table = 'produtos';

    // Colunas que podem ser preenchidas (incluindo a imagem que você vai adicionar)
    protected $fillable = ['nome', 'preco', 'estoque', 'imagem'];
}
