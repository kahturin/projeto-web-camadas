<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Produto_Estoque extends Model
{
    use HasFactory;

    protected $fillable = [
        'PRODUTO_QTD',
    ];

    protected $table = "ESTOQUE";

    public function produtos(){
        return $this->hasMany(Produto::class, 'PRODUTO_ID', 'id');
    }
}
