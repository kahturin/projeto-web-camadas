<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['produto_nome','produto_desc','produto_preco','produto_desconto','produto_ativo'];

    protected $primaryKey = 'pkproduto';

    protected $table = 'produto';

    public $incrementing = true;



}
