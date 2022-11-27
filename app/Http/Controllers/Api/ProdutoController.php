<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        $arrayProdutos = [];
        foreach($produtos as $p ){
            $categoria = Categoria::findOrFail($p->CATEGORIA_ID);
            $prod = [
                'PRODUTO_NOME' => $p->PRODUTO_NOME,
                'id' => $p->id,
                'PRODUTO_DESC' => $p->PRODUTO_DESC,
                'PRODUTO_PRECO' => $p->PRODUTO_PRECO,
                'PRODUTO_ATIVO' => $p->PRODUTO_ATIVO,
                'CATEGORIA_ID' => $p->CATEGORIA_ID,
                'PRODUTO_DESCONTO' => $p->PRODUTO_DESCONTO,
                'CATEGORIA_NOME' => $categoria->CATEGORIA_NOME,
            ];

            array_push($arrayProdutos, $prod);
        };

        return response()->json($arrayProdutos, 200);
    }

    public function show($id)
    {
        $produto = Produto::findOrFail($id);

        $categoria = $produto->categoria()->first();

        return response()->json(['produto' => $produto, 'categoria' => $categoria->CATEGORIA_NOME], 200);
    }

    public function search($s)
    {
        $produtos = Produto::where('CATEGORIA_NOME', 'like', '%'.$s.'%')->get();

        return response()->json($produto, 200);
    }
}
