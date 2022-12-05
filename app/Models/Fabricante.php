<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\Models\Produto;

class Fabricante extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'nm_fabricante', 
        'desc_fabricante',
        'cnpj',
    ];

  

    public function produtos()
    {
        return $this->hasMany(Produto::class); // pq um fabricante, tem muitos produtos.
    }
}
