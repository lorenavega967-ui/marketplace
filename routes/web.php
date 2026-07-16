<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolicitudEmprendedorController;
use Illuminate\Support\Facades\Route;
 feature/panel-emprendedor
use App\Http\Controllers\PerfilController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\EmprendimientoController;
use App\Http\Controllers\Admin\ProductoController;

 main

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/emprendimientos', [HomeController::class, 'emprendimientos'])->name('emprendimientos.index');
Route::get('/productos', [HomeController::class, 'productos'])->name('productos.index');
Route::get('/emprendimiento/{slug}', [HomeController::class, 'showEmprendimiento'])->name('emprendimientos.show');

Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias.index');
Route::get('/noticias/{slug}', [NoticiaController::class, 'show'])->name('noticias.show');

Route::get('/solicitud-emprendedor', [SolicitudEmprendedorController::class, 'create'])->name('solicitud-emprendedor.create');
Route::post('/solicitud-emprendedor', [SolicitudEmprendedorController::class, 'store'])->name('solicitud-emprendedor.store');

 feature/panel-emprendedor
Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil');
Route::get('/dashboard', [PerfilController::class, 'index'])->name('dashboard');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//PARA ADMIN
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('usuarios', UsuarioController::class);
        Route::resource('categorias', CategoriaController::class); 
        Route::resource('emprendimientos', EmprendimientoController::class);
        Route::resource('productos', ProductoController::class);
});



/*Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    // 
});*/

Route::middleware(['auth', 'role:dueño'])->prefix('panel')->group(function () {
    // 
});

require __DIR__.'/auth.php';
 main
