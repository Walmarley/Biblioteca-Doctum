<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Autenticador;
use Illuminate\Support\Facades\Route;

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
    return redirect('/series');
})->middleware(Autenticador::class);

Route::get('/login', [UserController::class,'login'])->name('user.log');
Route::post('/login', [UserController::class,'Authenticate'])->name('user.login');

Route::get('/logout', [UserController::class,'logout'])->name('logout');


Route::get('/newuser', [UserController::class,'layout'])->name('user.layout');
Route::post('/newuser', [UserController::class,'store'])->name('user.store');

Route::get('/layout', [BookController::class, 'layout'])->name('book.layout');
Route::post('/layout', [BookController::class, 'store'])->name('book.store');

Route::get('/livros', [BookController::class, 'index'])->name('book.index');
Route::get('/show/{id}', [BookController::class, 'show'])->name('book.show');
Route::delete('/excluir/{id}', [BookController::class, 'destroy'])->name('book.destroy');