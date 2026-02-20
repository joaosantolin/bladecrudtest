<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProdutoController;

/**************************************************
 * Rotas para a Loja
 **************************************************/
// Página inicial - lista de produtos
Route::get('/', [ProdutoController::class, 'index']);

// Visualizar produto específico
Route::get('/produtos/{id}', [ProdutoController::class, 'show'])->name('produtos.show');

// Exibe o formulário e lista de produtos
Route::get('/admin/cadastro', [ProdutoController::class, 'admin'])->name('admin.cadastro');

// Processa o cadastro de produtos
Route::post('/admin/cadastro', [ProdutoController::class, 'store'])->name('produtos.store');

//Rota para deletar o produto
Route::delete('/admin/produtos/{id}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');
