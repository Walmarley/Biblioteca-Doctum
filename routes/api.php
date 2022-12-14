<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LogarController;
use App\Http\Controllers\UserController;

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


Route::get('/livros', [BookController::class, 'index']);
Route::post('/cadastrarLivro', [BookController::class, 'store']);
Route::put('/atualizarLivro/{id}', [BookController::class, 'update']);
Route::get('/livro/{id}', [BookController::class, 'show']);
Route::delete('/excluir/{id}', [BookController::class, 'destroy']);

Route::post('/criarUser', [UserController::class, 'store']);
Route::get('/users', [UserController::class, 'index']);

Route::post('/logar', [UserController::class, 'Authenticate']);