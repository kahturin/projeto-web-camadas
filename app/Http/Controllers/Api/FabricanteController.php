<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fabricante;
use App\Models\Produto;


class FabricanteController extends Controller
{
    public function index()
    {
        return response()->json(Fabricante::all(), 200);
    }

    public function store(Request $request)
    {
        $campos = $request->validate([ //validação dos dados recebidos pela request
            'nm_fabricante'   => 'required|string|unique:fabricantes,nm_fabricante',
            'desc_fabricante' => 'string|unique:fabricantes,desc_fabricante',
            'cnpj'            => 'required|integer|unique:fabricantes,cnpj',

            
        ]);

        $fabricante = Fabricante::create([ //criando os dados na tabela
            'nm_fabricante'   => $campos['nm_fabricante'],
            'desc_fabricante' => $campos['desc_fabricante'],
            'cnpj'            => $campos['cnpj'],
        ]);

        return response()->json(['message', 'Fabricante criada com sucesso'], 201);
    }

    public function show($id)
    {
        return response()->json(Fabricante::findOrFail($id), 200);
    }

    public function update(Request $request, $id)
    {
        $fabricante = Fabricante::findOrFail($id);
        $campos;

        if($fabricante->nm_fabricante == $request->nm_fabricante){
            $campos = $request->validate([
                'desc_fabricante' => 'string|unique:fabricantes,desc_fabricante',
                'cnpj'            => 'required|integer|unique:fabricantes,cnpj',
            ]);
        } else {
            $campos = $request->validate([
                'nm_fabricante'   => 'required|string|unique:fabricantes,nm_fabricante',
                'desc_fabricante' => 'string|unique:fabricantes,desc_fabricante',
                'cnpj'            => 'required|integer|unique:fabricantes,cnpj',
            ]);
        }

        $fabricante->update($request->all());

        return response()->json(['message' => 'Fabricante atualizado com sucesso'], 200);
    }

    public function destroy($id)
    {
        $fabricante = Fabricante::findOrFail($id);
        $produtos = $fabricante->produtos()->get();

        if(sizeof($produtos) > 0){ //validação se fabricante possui produto, se possuir, não excluir.
            return response()->json([
                'message' , 'Não é possivel excluir um Fabricante vinculada a um produto'
            ], 406);
        }

        $fabricante->delete();

        return response()->json([
            'message', 'Fabricante excluido com sucesso'
        ], 200);

    }

    public function produtosPorFabricante($id){
        $fabricante = Fabricante::findOrFail($id);

        $produtos = $fabricante->produtos()->get();

        return response()->json(['fabricante' => $fabricante->nm_fabricante, 'produtos' => $produtos], 200);
    }
}
