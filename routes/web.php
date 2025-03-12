<?php

use App\Http\Controllers\PerfilController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\DescargaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\ContactController;

// Ruta principal
Route::get('/', function () {
    return view('home');
});

Auth::routes();

// Ruta para la página de inicio
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas para usuarios autenticados
Route::middleware(['auth'])->group(function () {
    
    // Ruta para el formulario
    Route::get('/formulario', [FormularioController::class, 'index'])->name('formulario.index');

    // Rutas del perfil del usuario
    Route::get('/perfil', [PerfilController::class, 'edit'])->name('perfil.edit'); // Vista de edición
    Route::post('/perfil', [PerfilController::class, 'update'])->name('perfil.update'); // Guardar cambios

    // Rutas para la compra
    Route::get('/compra', [CompraController::class, 'index'])->name('compra');
    Route::post('/compra', [CompraController::class, 'procesarCompra'])->name('compra.procesar');
    
    // Ruta para la descarga
    Route::get('/descarga', [DescargaController::class, 'index'])->name('descarga');




    
    // Rutas para Soporte
    Route::middleware('auth')->get('/soporte', [SupportController::class, 'show'])->name('soporte');

    Route::get('/soporte', [SupportController::class, 'show'])->name('soporte');


    Route::get('/contacto', [ContactController::class, 'show'])->name('contacto');



    // Rutas para perfil o foto eso
    route::middleware(['auth'])->group(function () {
        Route::get('/perfil', [PerfilController::class, 'edit'])->name('perfil.edit');
        Route::post('/perfil', [PerfilController::class, 'update'])->name('perfil.update');
    });
});