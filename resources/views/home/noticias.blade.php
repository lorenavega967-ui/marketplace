<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Noticias - Marketplace ITSE</title>
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
                <ul class="navbar-nav me-auto align-items-center">
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
                    @guest
                        <li class="nav-item ms-lg-3">
                            <a href="{{ route('solicitud-emprendedor.create') }}" class="btn btn-primary-custom py-2 px-3 text-white" style="font-size: 0.95rem;">¿Quieres emprender?</a>
                        </li>
                    @endguest
                </ul>
                <div class="d-flex align-items-center">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary-custom">Mi panel</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary-custom">Iniciar sesión</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="container itse-section" style="margin-top: 70px;">
        <div class="mb-5">
            <h1 class="itse-section-title">Noticias</h1>
            <p class="itse-section-subtitle">Mantente informado sobre eventos, actividades y novedades de nuestra comunidad de emprendedores.</p>
        </div>

        @if($noticias->count() > 0)
            <div class="itse-grid">
                @foreach($noticias as $noticia)
                    <x-noticia-card :noticia="$noticia" />
                @endforeach
            </div>

            <div class="mt-5">
                {{ $noticias->links() }}
            </div>
        @else
            <div class="itse-card p-5 text-center">
                <div class="fs-1 mb-3">📰</div>
                <h3 class="fw-bold mb-2">No hay noticias publicadas</h3>
                <p class="text-muted">Mantente atento, pronto habrá nuevas publicaciones.</p>
            </div>
        @endif
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
