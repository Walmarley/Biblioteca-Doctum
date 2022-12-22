<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\MaintenanceScheduledController;
use App\Http\Controllers\VehicleController;
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
    return redirect('/');
})->middleware(Autenticador::class);

Route::get('/login', [AuthController::class,'log'])->name('log');
Route::post('/login', [AuthController::class,'login'])->name('login');
Route::get('/logout', [AuthController::class,'logout'])->name('logout');



Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');

Route::get('/addvehicles', [VehicleController::class, 'routeAddVehicle'])->name('addvehicle');
Route::post('/vehiclestore', [VehicleController::class, 'store'])->name('vehicleStore');

// Route::get('/show/{id}', [BookController::class, 'show'])->name('book.show');
Route::delete('/excluirveiculo/{id}', [VehicleController::class, 'destroy'])->name('veiculo.destroy');

Route::get('/listamanutecao/{id}', [MaintenanceController::class, 'index'])->name('manutencao.index');

Route::get('/addvehicles/{id}', [MaintenanceController::class, 'routeAddMaintenance'])->name('addMaintenance');
Route::post('/vehiclestore/{id}', [MaintenanceController::class, 'store'])->name('maintenanceStore');
Route::delete('/excluirmanutencao/{id}', [MaintenanceController::class, 'destroy'])->name('manutencao.destroy');

Route::get('/agenda', [MaintenanceScheduledController::class, 'schedulingUser']);
