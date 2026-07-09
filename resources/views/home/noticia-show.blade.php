<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $noticia->titulo }} - Marketplace ITSE</title>
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
                        <a class="nav-link nav-link-custom" href="{{ route('home') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="{{ route('emprendimientos.index') }}">Emprendimientos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="{{ route('productos.index') }}">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="{{ route('noticias.index') }}">Noticias</a>
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

    <main class="container py-5" style="margin-top: 70px;">
        <a href="{{ route('noticias.index') }}" class="btn btn-outline-primary mb-4">
            <i class="bi bi-arrow-left"></i> Volver a noticias
        </a>

        @if($noticia->imagen)
            <img src="{{ $noticia->imagen }}" alt="{{ $noticia->titulo }}" class="img-fluid rounded shadow mb-4" style="max-height: 400px; width: 100%; object-fit: cover;">
        @else
            <div class="bg-purple-gradient rounded shadow mb-4 d-flex align-items-center justify-content-center" style="height: 400px;">
                <span class="text-white fs-1">📰</span>
            </div>
        @endif

        <h1 class="display-5 fw-bold mb-4">{{ $noticia->titulo }}</h1>

        <div class="d-flex flex-wrap gap-2 mb-4">
            @if($noticia->fecha_evento)
                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2">
                    <i class="bi bi-calendar-event me-1"></i>{{ $noticia->fecha_evento->format('d/m/Y - H:i') }}
                </span>
            @endif
            @if($noticia->ubicacion_evento)
                <span class="badge bg-info bg-opacity-10 text-info px-3 py-2">
                    <i class="bi bi-geo-alt me-1"></i>{{ $noticia->ubicacion_evento }}
                </span>
            @endif
            <span class="badge bg-secondary px-3 py-2">
                <i class="bi bi-person me-1"></i>{{ $noticia->creador->name ?? 'Admin' }}
            </span>
            <span class="badge bg-secondary px-3 py-2">
                <i class="bi bi-clock me-1"></i>{{ $noticia->created_at->format('d/m/Y') }}
            </span>
        </div>

        <div class="card border-0 shadow p-4">
            <div class="card-body">
                {!! $noticia->contenido !!}
            </div>
        </div>
    </main>

    {{-- Footer --}}
    <footer class="bg-dark-gradient text-white py-4">
        <div class="container text-center">
            <div class="d-flex align-items-center justify-content-center mb-2">
                <div class="bg-primary-gradient text-white rounded d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                    <span class="fw-bold">IT</span>
                </div>
                <span class="fw-bold">Marketplace ITSE</span>
            </div>
            <small class="text-white-50">&copy; {{ date('Y') }} Marketplace ITSE Panamá. Todos los derechos reservados.</small>
        </div>
    </footer>

</body>
</html>
