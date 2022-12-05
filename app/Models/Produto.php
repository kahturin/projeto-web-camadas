<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nm_produto', 
        'desc_produto',
        'vl_produto',
        'id_categoria',
        'qtd_produto',
        'img_produto',
        'fabricante_id',
    ];

    public function categoria(){
        return $this->hasMany(Categoria::class, 'id', 'id_categoria');
    }

    public function fabricante(){
        return $this->belongsTo(Fabricante::class); // pq "this produto" pertence a um fabricante
    }
}
