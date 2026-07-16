<?php

namespace Database\Seeders;

use App\Models\Noticia;
use App\Models\User;
use Illuminate\Database\Seeder;

class NoticiaSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('rol', 'admin')->first();

        if (!$admin) {
            $admin = User::create([
                'name' => 'Admin',
                'email' => 'admin@itse.edu.pa',
                'password' => bcrypt('password'),
                'rol' => 'admin',
            ]);
        }

        $noticias = [
            [
                'titulo' => 'Feria de Emprendedores ITSE 2026',
                'contenido' => 'Les invitamos a la gran feria de emprendedores que se realizará en el campus principal. Más de 50 emprendedores mostrarán sus productos y servicios. No te lo pierdas!',
                'imagen' => null,
                'fecha_evento' => '2026-07-15 09:00:00',
                'ubicacion_evento' => 'Campus Principal - Escuela de Innovación Digital',
                'estado' => 'publicado',
                'slug' => 'feria-de-emprendedores-itse-2026',
            ],
            [
                'titulo' => 'Nuevo ciclo de talleres empresariales',
                'contenido' => 'El ITSE lanza un nuevo ciclo de talleres gratuitos para emprendedores. Temas: marketing digital, finanzas básicas, y gestión de inventario.',
                'imagen' => null,
                'fecha_evento' => null,
                'ubicacion_evento' => null,
                'estado' => 'publicado',
                'slug' => 'nuevo-ciclo-de-talleres-empresariales',
            ],
            [
                'titulo' => 'Convocatoria para emprendedores invitados',
                'contenido' => 'Estamos buscando emprendedores externos para participar en nuestras ferias mensuales. Si tienes un negocio y quieres mostrarlo, contáctanos.',
                'imagen' => null,
                'fecha_evento' => null,
                'ubicacion_evento' => null,
                'estado' => 'publicado',
                'slug' => 'convocatoria-emprendedores-invitados',
            ],
            [
                'titulo' => 'Apertura de inscripciones para el programa de incubación',
                'contenido' => 'El programa de incubación de empresas del ITSE abre sus inscripciones. Acompañamiento personalizado para tu emprendimiento.',
                'imagen' => null,
                'fecha_evento' => '2026-08-01 08:00:00',
                'ubicacion_evento' => 'Oficina de Emprendimiento - Edificio Administrativo',
                'estado' => 'publicado',
                'slug' => 'apertura-inscripciones-programa-incubacion',
            ],
            [
                'titulo' => 'Éxito en feria gastronómica',
                'contenido' => 'Los emprendedores del ITSE destacaron en la feria gastronómica regional con sus productos innovadores.',
                'imagen' => null,
                'fecha_evento' => null,
                'ubicacion_evento' => null,
                'estado' => 'publicado',
                'slug' => 'exito-en-feria-gastronomica',
            ],
        ];

        foreach ($noticias as $noticia) {
            Noticia::create([
                ...$noticia,
                'creador_id' => $admin->id,
            ]);
        }
    }
}
