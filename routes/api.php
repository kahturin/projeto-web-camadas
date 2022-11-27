<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\ItemdopedidoController;

use App\Http\Controllers\Api\TbCarrinhoController;
use App\Http\Controllers\Api\PedidoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Produtos
Route::get('/produtos', [ProdutoController::class, 'index']);
Route::get('/produto/{id}', [ProdutoController::class, 'show']);
Route::get('/produtos/procurar/{s}', [ProdutoController::class, 'search']);

//Categoria
Route::get('/categorias', [CategoriaController::class, 'index']);
Route::get('/produtos/categoria/{id}', [CategoriaController::class, 'produtosPorCategoria']);
Route::get('/categoria/{id}', [CategoriaController::class, 'show']);