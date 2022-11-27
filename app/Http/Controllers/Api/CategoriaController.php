<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{

    public function index()
    {
        return response()->json(Categoria::all(), 200);
    }

    public function show($id)
    {
        return response()->json(Categoria::findOrFail($id), 200);
    }

    public function produtosPorCategoria($id){
        $categoria = Categoria::findOrFail($id);

        $produtos = $categoria->produtos()->get();

        return response()->json(['categoria' => $categoria->nm_categoria, 'produtos' => $produtos], 200);
    }
}
