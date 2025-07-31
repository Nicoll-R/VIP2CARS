<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Autenticación
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.submit');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Rutas protegidas
Route::middleware(['auth'])->group(function () {
    // Vehículos
    Route::prefix('/clientes/{cliente}/vehiculos')->group(function () {
        Route::get('/', [VehiculoController::class, 'index'])->name('clientes.vehiculos.index');
        Route::get('/create', [VehiculoController::class, 'create'])->name('clientes.vehiculos.create');
        Route::post('/', [VehiculoController::class, 'store'])->name('clientes.vehiculos.store');
        Route::get('/{vehiculo}', [VehiculoController::class, 'show'])->name('clientes.vehiculos.show');
        Route::get('/{vehiculo}/edit', [VehiculoController::class, 'edit'])->name('clientes.vehiculos.edit');
        Route::put('/{vehiculo}', [VehiculoController::class, 'update'])->name('clientes.vehiculos.update');
        Route::delete('/{vehiculo}', [VehiculoController::class, 'destroy'])->name('clientes.vehiculos.destroy');
    });
});