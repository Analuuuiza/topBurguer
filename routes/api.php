<?php

use App\Http\Controllers\CadastroController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/produtos', [ProdutoController::class, 'index']);
Route::post('/produtos', [ProdutoController::class, 'store']);

Route::get('/cadastros', [CadastroController::class, 'index']);
Route::post('/cadastros', [CadastroController::class, 'store']);


