<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'PRODUTO_NOME', 
        'PRODUTO_DESC',
        'PRODUTO_PRECO',
        'PRODUTO_DESCONTO',
        'CATEGORIA_ID',
        'PRODUTO_ATIVO',
    ];

    protected $table = "PRODUTO";

    public function categoria(){
        return $this->hasMany(Categoria::class, 'id', 'CATEGORIA_ID'); 
    }
}
