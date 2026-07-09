<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Marketplace ITSE') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <div class="bg-primary-gradient text-white rounded d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                    <span class="fw-bold">IT</span>
                </div>
                <span class="fw-bold text-primary">Marketplace ITSE</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->route()->getName() === 'home' ? 'active' : '' }}" href="{{ route('home') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->route()->getName() === 'emprendimientos.index' ? 'active' : '' }}" href="{{ route('emprendimientos.index') }}">Emprendimientos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->route()->getName() === 'productos.index' ? 'active' : '' }}" href="{{ route('productos.index') }}">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->route()->getName() === 'noticias.index' ? 'active' : '' }}" href="{{ route('noticias.index') }}">Noticias</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-link text-decoration-none">Mi panel</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-link text-decoration-none me-2">Iniciar sesión</a>
                        <a href="{{ route('register') }}" class="btn btn-primary-custom">Registrarse</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{-- Hero Section --}}
    <header class="bg-primary-gradient text-white hero-pattern pt-5 pb-5" style="margin-top: 70px;">
        <div class="container py-5">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="display-3 fw-bold mb-4">
                        Emprendimientos<br>
                        <span class="text-white-50">ITSE Panamá</span>
                    </h1>
                    <p class="lead text-white-75 mb-4">
                        Descubre los negocios y productos de estudiantes y emprendedores invitados, todo en un solo lugar.
                    </p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ route('emprendimientos.index') }}" class="btn btn-light text-primary fw-bold px-4">
                            Ver Emprendimientos
                        </a>
                        <a href="{{ route('productos.index') }}" class="btn btn-outline-light fw-bold px-4">
                            Ver Productos
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="container py-5">
        {{-- Noticias Section --}}
        @if($noticias->count() > 0)
            <section class="mb-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="fw-bold mb-1">Noticias y Eventos</h2>
                        <p class="text-muted">Mantente informado sobre las últimas novedades</p>
                    </div>
                    <a href="{{ route('noticias.index') }}" class="btn btn-outline-primary">
                        Ver todas <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @foreach($noticias as $noticia)
                        <div class="col">
                            <x-noticia-card :noticia="$noticia" />
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        {{-- Emprendimientos Destacados --}}
        @if($emprendimientosDestacados->count() > 0)
            <section class="mb-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="fw-bold mb-1">Emprendimientos Destacados</h2>
                        <p class="text-muted">Conoce los negocios más destacados de nuestra comunidad</p>
                    </div>
                    <a href="{{ route('emprendimientos.index') }}" class="btn btn-outline-primary">
                        Ver todos <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @foreach($emprendimientosDestacados as $emprendimiento)
                        <div class="col">
                            <x-emprendimiento-card :emprendimiento="$emprendimiento" />
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        {{-- Productos Recientes --}}
        @if($productosRecientes->count() > 0)
            <section class="mb-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="fw-bold mb-1">Productos Recientes</h2>
                        <p class="text-muted">Explora los últimos productos agregados</p>
                    </div>
                    <a href="{{ route('productos.index') }}" class="btn btn-outline-primary">
                        Ver todos <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                    @foreach($productosRecientes as $producto)
                        <div class="col">
                            <x-producto-card :producto="$producto" />
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        {{-- Categorías --}}
        @if($categorias->count() > 0)
            <section class="mb-5">
                <div class="text-center mb-4">
                    <h2 class="fw-bold mb-1">Explora por Categoría</h2>
                    <p class="text-muted">Encuentra lo que buscas fácilmente</p>
                </div>
                <div class="row row-cols-2 row-cols-md-4 row-cols-lg-6 g-3">
                    @foreach($categorias as $categoria)
                        <div class="col">
                            <a href="{{ route('emprendimientos.index', ['categoria' => $categoria->id]) }}"
                               class="card card-hover text-center text-decoration-none border-0 shadow h-100">
                                <div class="card-body">
                                    <div class="fs-2 mb-2">📂</div>
                                    <h6 class="fw-bold text-dark">{{ $categoria->nombre }}</h6>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif
    </main>

    {{-- Footer --}}
    <footer class="bg-dark-gradient text-white py-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary-gradient text-white rounded d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                            <span class="fw-bold">IT</span>
                        </div>
                        <span class="fw-bold">Marketplace ITSE</span>
                    </div>
                    <p class="text-white-50">
                        Plataforma para emprendedores del Instituto Tecnológico Superior del Este. Conectando talento con oportunidades.
                    </p>
                </div>
                <div>
                    <h5 class="fw-bold mb-3 text-primary">Enlaces Rápidos</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none hover:text-white">Inicio</a></li>
                        <li class="mb-2"><a href="{{ route('emprendimientos.index') }}" class="text-white-50 text-decoration-none hover:text-white">Emprendimientos</a></li>
                        <li class="mb-2"><a href="{{ route('productos.index') }}" class="text-white-50 text-decoration-none hover:text-white">Productos</a></li>
                        <li class="mb-2"><a href="{{ route('noticias.index') }}" class="text-white-50 text-decoration-none hover:text-white">Noticias</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="fw-bold mb-3 text-primary">Contacto</h5>
                    <p class="text-white-50 mb-3">
                        ¿Tienes preguntas? Contáctanos a través de la administración del ITSE.
                    </p>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-primary btn-sm rounded-circle">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                        <a href="#" class="btn btn-primary btn-sm rounded-circle">
                            <i class="bi bi-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
            <hr class="border-secondary my-4">
            <div class="text-center text-white-50">
                <small>&copy; {{ date('Y') }} Marketplace ITSE Panamá. Todos los derechos reservados.</small>
            </div>
        </div>
    </footer>

</body>
</html>