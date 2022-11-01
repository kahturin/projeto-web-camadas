<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class PedidoController extends Controller
{

    public function index()
    {
        $categorias = Categoria::all();

        return response() -> json([
            'status' => 200,
            'mensagem' => 'Pedido retornado',
            'categorias' => CategoriaResource::collection($categorias)
        ], 200);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nomedacategoria = $request->nome_da_categoria;
        $categoria->save();

        return response() -> json([
            'status' => 200,
            'mensagem' => 'Pedido criado',
            'categorias' => new CategoriaResource($categoria)
        ], 200);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
