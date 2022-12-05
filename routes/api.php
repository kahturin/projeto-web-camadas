<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\FabricanteController;


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

// Produto
Route::get('/produtos', [ProdutoController::class, 'index']);
Route::get('/produto/{id}', [ProdutoController::class, 'show']);
Route::post('/produto', [ProdutoController::class, 'store']);
Route::put('/produto/{id}', [ProdutoController::class, 'update']);
Route::delete('/produto/{id}', [ProdutoController::class, 'destroy']);

//Categoria
Route::get('/categorias', [CategoriaController::class, 'index']);
Route::get('/produtos/categoria/{id}', [CategoriaController::class, 'produtosPorCategoria']);
Route::get('/categoria/{id}', [CategoriaController::class, 'show']);
Route::post('/categoria', [CategoriaController::class, 'store']);
Route::put('/categoria/{id}', [CategoriaController::class, 'update']);
Route::delete('/categoria/{id}', [CategoriaController::class, 'destroy']);

//Fabricante

Route::get('/fabricantes', [FabricanteController::class, 'index']);
Route::get('/produtos/fabricante/{id}', [FabricanteController::class, 'produtosPorFabricante']);
Route::get('/fabricante/{id}', [FabricanteController::class, 'show']);
Route::post('/fabricante', [FabricanteController::class, 'store']);
Route::put('/fabricante/{id}', [FabricanteController::class, 'update']);
Route::delete('/fabricante/{id}', [FabricanteController::class, 'destroy']);