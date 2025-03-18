<?php

use App\Http\Controllers\PerfilController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\DescargaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

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



    // Rutas para el chat de soporte (tickets)
    Route::middleware('auth')->group(function () {
        Route::get('/chatsoporte', [TicketController::class, 'index'])->name('chatsoporte');
        Route::post('/chatsoporte', [TicketController::class, 'store']);
        Route::post('/chatsoporte/{ticket}/responder', [TicketController::class, 'responder']);
        Route::post('/chatsoporte/{ticket}/cerrar', [TicketController::class, 'cerrar']);
    });


    // Ruta para descargar el software

    Route::get('/descargar-software', function () {
        $filePath = public_path('descargas/PruebaEduBeaver.zip');
    
        if (!file_exists($filePath)) {
            abort(404, 'Archivo no encontrado.');
        }
    
        return Response::download($filePath, 'PruebaEduBeaver.zip');
    })->name('descargar.software');
    

    
    

});