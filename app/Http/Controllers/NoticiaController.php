<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function index()
    {
        $noticias = Noticia::where('estado', 'publicado')
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('home.noticias', compact('noticias'));
    }

    public function show($slug)
    {
        $noticia = Noticia::where('slug', $slug)
            ->where('estado', 'publicado')
            ->with('creador')
            ->firstOrFail();

        return view('home.noticia-show', compact('noticia'));
    }
}
