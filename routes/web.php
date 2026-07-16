<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolicitudEmprendedorController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/emprendimientos', [HomeController::class, 'emprendimientos'])->name('emprendimientos.index');
Route::get('/productos', [HomeController::class, 'productos'])->name('productos.index');
Route::get('/emprendimiento/{slug}', [HomeController::class, 'showEmprendimiento'])->name('emprendimientos.show');

Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias.index');
Route::get('/noticias/{slug}', [NoticiaController::class, 'show'])->name('noticias.show');

Route::get('/solicitud-emprendedor', [SolicitudEmprendedorController::class, 'create'])->name('solicitud-emprendedor.create');
Route::post('/solicitud-emprendedor', [SolicitudEmprendedorController::class, 'store'])->name('solicitud-emprendedor.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    // 
});

Route::middleware(['auth', 'role:dueño'])->prefix('panel')->group(function () {
    // 
});

require __DIR__.'/auth.php';
