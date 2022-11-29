<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Categorias
Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');
Route::get('/categoria/create', [CategoriaController::class, 'create'])->name('categoria.create');
Route::get('/categoria/show/{id}', [CategoriaController::class, 'show'])->name('categoria.show');
Route::post('/categoria/store', [CategoriaController::class, 'store'])->name('categoria.store');
Route::get('/categoria/edit/{id}', [CategoriaController::class, 'edit'])->name('categoria.edit');
Route::post('/categoria/update/{id}', [CategoriaController::class, 'update'])->name('categoria.update');
Route::post('/categoria/destroy/{id}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');

//Produtos
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('/produto/show/{id}', [ProdutoController::class, 'show'])->name('produto.show');
Route::get('/produto/create', [ProdutoController::class, 'create'])->name('produto.create');
Route::post('/produto/store', [ProdutoController::class, 'store'])->name('produto.store');
Route::get('/produto/edit/{id}', [ProdutoController::class, 'edit'])->name('produto.edit');
Route::post('/produto/update/{id}', [ProdutoController::class, 'update'])->name('produto.update');
Route::post('/produto/destroy/{id}', [ProdutoController::class, 'destroy'])->name('produto.destroy');