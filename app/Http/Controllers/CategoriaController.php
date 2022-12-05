<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * @OA\Get(
     * path="/api/categorias",
     * operationId="getCategoriasList",
     * tags{"Categorias"},
     * summary = "Retorna a lista de categorias",
     * description="Retorna o Json de todas as categorias em listagem",
     * @OA\Response(
     *      response = 200,
     *      description = "Operação executada com sucesso"
     *  )
     * )
     */ 
    public function index(){
        return view('categoria.index')->with('categorias', Categoria::all());
    }

    public function create(){
        return view('categoria.create');
    }

        /**
     * @OA\Post(
     * path="/api/categorias",
     * operationId="StoreCategoria",
     * tags{"Categorias"},
     * summary = "Cria uma nova categoria",
     * description="Retorna o Json com os dados da nova Categoria",
     * @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/StoreCategoriaRequest")
     * ),
     * @OA\Response(
     *      response =200,
     *      description = "Operação executada com sucesso"),
     *      @OA\JsonContent(ref="#/components/schemas/Categoria")
     *  )
     * )
     */ 
    public function store(Request $request){
        $request->validate([
            'nm_categoria' => 'required|string|unique:categorias,nm_categoria'
        ]);

        Categoria::create($request->all());

        session()->flash('success', 'Categoria criada com sucesso');

        return redirect()->route('categoria.index');
    }

            /**
     * @OA\Get(
     * path="/api/categoria/{id}",
     * operationId="getCategoriaById",
     * tags{"Categorias"},
     * summary = "Retorna a informação de uma categoria",
     * description="Retorna o Json da categoria requisitada",
     * @OA\Parameter(
     *      name ="id",
     *      description = "Id da Categoria",
     *      required =true,
     *      in="path",
     *  @OA\Schema(
     *      type="integer"
     *  )
     * ),
     *      
     * @OA\Response(
     *      response =200,
     *      description = "Operação executada com sucesso")
     *  )
     * )
     */ 
    public function show($idCategoria){
        $categoria = Categoria::findOrFail($idCategoria);

        return view('categoria.show')->with('categoria', $categoria);
    }

    public function edit($id){
        $c = Categoria::findOrFail($id);

        return view('categoria.edit')->with('categoria', $c);
    }
    
                /**
     * @OA\Put(
     * path="/api/categoria/{id}",
     * operationId="updateCategoria",
     * tags{"Categorias"},
     * summary = "Atualiza categoria existente",
     * description="Retorna o Json da categoria atualizada",
     * @OA\Parameter(
     *      name ="id",
     *      description = "Id da Categoria",
     *      required =true,
     *      in="path",
     *  @OA\Schema(
     *      type="integer"
     *  )
     * ),
     * @OA\RequestBody(
     *      required= true,
     *      @OA\JsonContent(ref="#/components/schemas/StoreCategoriaRequest")
     * ),
     *      
     * @OA\Response(
     *      response =200,
     *      description = "Operação executada com sucesso")
     *  )
     * )
     */ 
    public function update(Request $request, $id){
        $c = Categoria::findOrFail($id);

        if($c->nm_categoria != $request->nm_categoria){
            $request->validate([
                'nm_categoria' => 'required|string|unique:categorias,nm_categoria'
            ]);
        }

        Categoria::where('id', $id)->update([
            'nm_categoria' => $request->nm_categoria,
        ]);

        session()->flash('success', 'Categoria atualizada com sucesso!');

        return redirect()->route('categoria.index');
    }

                    /**
     * @OA\Delete(
     * path="/api/categoria/{id}",
     * operationId="deleteCategoria",
     * tags{"Categorias"},
     * summary = "apaga uma categoria existente",
     * description="apaga uma categoria existente e nao há retorno de dados",
     * @OA\Parameter(
     *      name ="id",
     *      description = "Id da Categoria",
     *      required =true,
     *      in="path",
     *  @OA\Schema(
     *      type="integer"
     *  )
     * ),   
     * @OA\Response(
     *      response =200,
     *      description = "Operação executada com sucesso")
     * @OA\JsonContent()
     *  )
     * )
     */ 

    public function destroy($id){
        $categoria = Categoria::findOrFail($id);

        $produtos = $categoria->produtos()->get();

        if(\sizeof($produtos)){
            session()->flash('error', 'Você não pode apagar uma categoria vinculada a um produto');
            return redirect()->back();
        }

        $categoria->delete();

        session()->flash('success', 'Categoria foi apagada com sucesso!');
        return redirect()->route('categoria.index');
    }

}