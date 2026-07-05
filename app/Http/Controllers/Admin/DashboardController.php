<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Emprendimiento;
use App\Models\Producto;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsuarios = User::count();

        $totalCategorias = Categoria::count();

        $totalEmprendimientos = Emprendimiento::count();

        $totalProductos = Producto::count();

        $ultimosProductos = Producto::with('emprendimiento')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalUsuarios',
            'totalCategorias',
            'totalEmprendimientos',
            'totalProductos',
            'ultimosProductos'
        ));
    }
}