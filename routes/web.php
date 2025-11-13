<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaginaController;

// Ruta principal - Redirige a nuestra nueva página de bienvenida
Route::get('/', function () {
    return redirect()->route('bienvenida');
});

// Ruta estática de bienvenida
Route::get('/bienvenida', [PaginaController::class, 'bienvenida'])->name('bienvenida');

// Ruta dinámica de saludo con parámetro
Route::get('/saludo/{nombre}', [PaginaController::class, 'saludo'])->name('saludo');
