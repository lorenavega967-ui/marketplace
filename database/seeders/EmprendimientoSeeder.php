<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Emprendimiento;
use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EmprendimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener o crear categorías
        $categoriaComida = Categoria::firstOrCreate(
            ['slug' => 'comida'],
            ['nombre' => 'Comida', 'slug' => 'comida']
        );
        $categoriaTecnologia = Categoria::firstOrCreate(
            ['slug' => 'tecnologia'],
            ['nombre' => 'Tecnología', 'slug' => 'tecnologia']
        );
        $categoriaArtesanias = Categoria::firstOrCreate(
            ['slug' => 'artesanias'],
            ['nombre' => 'Artesanías', 'slug' => 'artesanias']
        );

        // Emprendimiento 1: Comida
        $emprendimiento1 = Emprendimiento::create([
            'user_id' => null,
            'categoria_id' => $categoriaComida->id,
            'tipo' => 'fijo',
            'nombre' => 'Sabor Panameño',
            'responsable' => 'María González',
            'slug' => 'sabor-panameno',
            'descripcion' => 'Especializados en comida tradicional panameña con un toque moderno. Ofrecemos sancochos, arroz con pollo, y platos típicos preparados con ingredientes frescos y recetas caseras.',
            'logo' => 'https://images.unsplash.com/photo-1555939594-58d7cb561ad1?w=400&h=400&fit=crop',
            'horario' => 'Lun-Sáb: 11:00 AM - 8:00 PM',
            'ubicacion' => 'Edificio Central, Piso 1',
            'whatsapp' => '+507 6000-0001',
            'instagram' => '@saborpanameno',
            'estado' => 'aprobado',
        ]);

        // Productos para Emprendimiento 1
        $productos1 = [
            [
                'nombre' => 'Sancocho de Gallina',
                'descripcion' => 'Sancocho tradicional con gallina, yuca, otoe, maíz y culantro. Sopa casera.',
                'precio' => 12.00,
                'imagen' => 'https://images.unsplash.com/photo-1547592166-23ac45744acd?w=400&h=300&fit=crop',
            ],
            [
                'nombre' => 'Arroz con Pollo',
                'descripcion' => 'Arroz con pollo cocinado a la antigua, con vegetales y especias.',
                'precio' => 10.00,
                'imagen' => 'https://images.unsplash.com/photo-1596797038530-2c107229654b?w=400&h=300&fit=crop',
            ],
            [
                'nombre' => 'Tamales',
                'descripcion' => 'Tamales de maíz nuevo con relleno de cerdo y pollo. Porción individual.',
                'precio' => 4.00,
                'imagen' => 'https://images.unsplash.com/photo-1576527965743-4c0a5885f8b6?w=400&h=300&fit=crop',
            ],
            [
                'nombre' => 'Carimañolas',
                'descripcion' => 'Carimañolas de yuca rellenas de carne. Porción de 3 unidades.',
                'precio' => 6.00,
                'imagen' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?w=400&h=300&fit=crop',
            ],
            [
                'nombre' => 'Jugo Natural',
                'descripcion' => 'Jugo natural de frutas de temporada. Naranja, sandía o maracuyá.',
                'precio' => 3.00,
                'imagen' => 'https://images.unsplash.com/photo-1623065422902-30a2d299bbe4?w=400&h=300&fit=crop',
            ],
        ];

        foreach ($productos1 as $producto) {
            Producto::create([
                'emprendimiento_id' => $emprendimiento1->id,
                'nombre' => $producto['nombre'],
                'descripcion' => $producto['descripcion'],
                'precio' => $producto['precio'],
                'imagen' => $producto['imagen'],
                'disponible' => true,
            ]);
        }

        // Emprendimiento 2: Tecnología
        $emprendimiento2 = Emprendimiento::create([
            'user_id' => null,
            'categoria_id' => $categoriaTecnologia->id,
            'tipo' => 'fijo',
            'nombre' => 'Tech Solutions ITSE',
            'responsable' => 'Carlos Rodríguez',
            'slug' => 'tech-solutions-itse',
            'descripcion' => 'Servicios tecnológicos para estudiantes y comunidad. Reparación de computadoras, venta de accesorios y soporte técnico especializado.',
            'logo' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=400&h=400&fit=crop',
            'horario' => 'Lun-Vie: 9:00 AM - 5:00 PM',
            'ubicacion' => 'Edificio de Tecnología, Local 3',
            'whatsapp' => '+507 6000-0002',
            'instagram' => '@techsolutionsitse',
            'estado' => 'aprobado',
        ]);

        // Productos para Emprendimiento 2
        $productos2 = [
            [
                'nombre' => 'Reparación de Laptop',
                'descripcion' => 'Diagnóstico y reparación de laptops. Incluye limpieza y mantenimiento.',
                'precio' => 35.00,
                'imagen' => 'https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=400&h=300&fit=crop',
            ],
            [
                'nombre' => 'Mouse Inalámbrico',
                'descripcion' => 'Mouse inalámbrico ergonómico con batería de larga duración.',
                'precio' => 15.00,
                'imagen' => 'https://images.unsplash.com/photo-1527864550417-7fd91fc51a46?w=400&h=300&fit=crop',
            ],
            [
                'nombre' => 'Teclado Mecánico',
                'descripcion' => 'Teclado mecánico RGB con switches azules. Ideal para gaming.',
                'precio' => 45.00,
                'imagen' => 'https://images.unsplash.com/photo-1587829741301-dc798b91add1?w=400&h=300&fit=crop',
            ],
            [
                'nombre' => 'Cable USB-C',
                'descripcion' => 'Cable USB-C de carga rápida de 2 metros. Compatible con múltiples dispositivos.',
                'precio' => 8.00,
                'imagen' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&h=300&fit=crop',
            ],
            [
                'nombre' => 'Soporte para Laptop',
                'descripcion' => 'Soporte ajustable de aluminio para laptops. Mejora la ergonomía.',
                'precio' => 20.00,
                'imagen' => 'https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?w=400&h=300&fit=crop',
            ],
        ];

        foreach ($productos2 as $producto) {
            Producto::create([
                'emprendimiento_id' => $emprendimiento2->id,
                'nombre' => $producto['nombre'],
                'descripcion' => $producto['descripcion'],
                'precio' => $producto['precio'],
                'imagen' => $producto['imagen'],
                'disponible' => true,
            ]);
        }

        // Emprendimiento 3: Artesanías
        $emprendimiento3 = Emprendimiento::create([
            'user_id' => null,
            'categoria_id' => $categoriaArtesanias->id,
            'tipo' => 'fijo',
            'nombre' => 'Artesanías del Istmo',
            'responsable' => 'Ana Martínez',
            'slug' => 'artesanias-del-istmo',
            'descripcion' => 'Artesanías tradicionales panameñas hechas a mano. Molas, taguas, y artesanías en madera que representan nuestra cultura.',
            'logo' => 'https://images.unsplash.com/photo-1459411552884-841db9b3cc2a?w=400&h=400&fit=crop',
            'horario' => 'Lun-Sáb: 10:00 AM - 6:00 PM',
            'ubicacion' => 'Edificio de Artes, Local 1',
            'whatsapp' => '+507 6000-0003',
            'instagram' => '@artesaniasistmo',
            'estado' => 'aprobado',
        ]);

        // Productos para Emprendimiento 3
        $productos3 = [
            [
                'nombre' => 'Mola Pequeña',
                'descripcion' => 'Mola tradicional kuná pequeña. Hecha a mano con técnicas ancestrales.',
                'precio' => 25.00,
                'imagen' => 'https://images.unsplash.com/photo-1596701812024-3d7b0c5c5d1a?w=400&h=300&fit=crop',
            ],
            [
                'nombre' => 'Tagua Tallada',
                'descripcion' => 'Figura de tagua tallada a mano representinge fauna local.',
                'precio' => 18.00,
                'imagen' => 'https://images.unsplash.com/photo-1558591710-4b4a1ae0f04d?w=400&h=300&fit=crop',
            ],
            [
                'nombre' => 'Sombrero Pintao',
                'descripcion' => 'Sombrero pintao pequeño. Tejido con fibras naturales.',
                'precio' => 40.00,
                'imagen' => 'https://images.unsplash.com/photo-1523381210434-271e8be1f52b?w=400&h=300&fit=crop',
            ],
            [
                'nombre' => 'Bolso Artesanal',
                'descripcion' => 'Bolso tejido con fibras naturales y diseños tradicionales.',
                'precio' => 30.00,
                'imagen' => 'https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=400&h=300&fit=crop',
            ],
            [
                'nombre' => 'Cerámica Decorativa',
                'descripcion' => 'Pieza de cerámica decorativa con motivos indígenas.',
                'precio' => 22.00,
                'imagen' => 'https://images.unsplash.com/photo-1565193566173-7a0ee3dbe261?w=400&h=300&fit=crop',
            ],
        ];

        foreach ($productos3 as $producto) {
            Producto::create([
                'emprendimiento_id' => $emprendimiento3->id,
                'nombre' => $producto['nombre'],
                'descripcion' => $producto['descripcion'],
                'precio' => $producto['precio'],
                'imagen' => $producto['imagen'],
                'disponible' => true,
            ]);
        }
    }
}
