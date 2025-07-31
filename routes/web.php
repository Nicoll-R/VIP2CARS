<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehiculoController;

// Ruta de inicio (login)
Route::get('/', function () {
    return view('login');
})->name('home');

// Autenticación
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [UserController::class, 'login'])->name('login.submit');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Grupo de rutas protegidas
Route::middleware(['auth'])->group(function () {
    // Dashboard principal
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas para clientes
    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
    
    // Rutas anidadas para vehículos
    Route::prefix('clientes/{cliente}')->group(function () {
        // Mostrar vehículos del cliente
        Route::get('/vehiculos', [VehiculoController::class, 'index'])->name('clientes.vehiculos.index');
        
        // Crear vehículo
        Route::get('/vehiculos/create', [VehiculoController::class, 'create'])->name('clientes.vehiculos.create');
        Route::post('/vehiculos', [VehiculoController::class, 'store'])->name('clientes.vehiculos.store');
        
        // Editar vehículo
        Route::get('/vehiculos/{vehiculo}/edit', [VehiculoController::class, 'edit'])->name('clientes.vehiculos.edit');
        Route::put('/vehiculos/{vehiculo}', [VehiculoController::class, 'update'])->name('clientes.vehiculos.update');
        
        // Eliminar vehículo
        Route::delete('/vehiculos/{vehiculo}', [VehiculoController::class, 'destroy'])->name('clientes.vehiculos.destroy');
        
        // Mostrar detalles de vehículo
        Route::get('/vehiculos/{vehiculo}', [VehiculoController::class, 'show'])->name('clientes.vehiculos.show');
    });
});