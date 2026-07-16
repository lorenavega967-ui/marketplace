<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerfilController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\EmprendimientoController;
use App\Http\Controllers\Admin\ProductoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/perfil', [PerfilController::class, 'index'])->name('perfil');
Route::get('/dashboard', [PerfilController::class, 'index'])->name('dashboard');

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
