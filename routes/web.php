<?php

use App\Http\Controllers\PerfilController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\DescargaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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
    Route::get('/soporte', [SupportController::class, 'show'])->name('soporte');

    Route::get('/contacto', [ContactController::class, 'show'])->name('contacto');

    // Rutas para el chat de soporte (tickets)
    Route::middleware('auth')->group(function () {
        Route::get('/chatsoporte', [TicketController::class, 'index'])->name('chatsoporte');
        Route::post('/chatsoporte', [TicketController::class, 'store']);
        Route::post('/chatsoporte/{ticket}/responder', [TicketController::class, 'responder']);
        Route::post('/chatsoporte/{ticket}/cerrar', [TicketController::class, 'cerrar']);
    });

    // Rutas para los tickets de soporte (usuarios)
    Route::get('/support/tickets', [TicketController::class, 'showUserTickets'])->name('support.tickets');
    Route::post('/support/ticket', [TicketController::class, 'createTicket'])->name('support.createTicket');
});

// routes/web.php

// Rutas para los tickets de soporte (administradores)
Route::middleware(['auth', 'can:is-admin'])->group(function () {
    Route::get('/admin/ticket/{ticketId}', [TicketController::class, 'getTicket'])->name('admin.getTicket');
    Route::get('/admin/tickets', [TicketController::class, 'showAdminTickets'])->name('admin.tickets');
    Route::post('/admin/ticket/{ticketId}/respond', [TicketController::class, 'respondTicket'])->name('admin.respondTicket');
;


    // Ruta para mostrar el formulario de asignación de roles
    Route::get('/admin/assign-roles', [UserController::class, 'showAssignRolesForm'])->name('admin.assignRoles');
    
    // Ruta para actualizar los roles
    Route::post('/admin/update-roles', [UserController::class, 'updateUserRoles'])->name('admin.updateRole');
});



