<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $emprendimiento->nombre }} - Marketplace ITSE</title>
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

    <main class="container py-5" style="margin-top: 70px;">
        <a href="{{ route('emprendimientos.index') }}" class="btn btn-outline-primary mb-4">
            <i class="bi bi-arrow-left"></i> Volver a emprendimientos
        </a>

        {{-- Header del emprendimiento --}}
        <div class="card border-0 shadow mb-5">
            <div class="row g-0">
                @if($emprendimiento->logo)
                    <div class="col-md-4">
                        <img src="{{ $emprendimiento->logo }}" alt="{{ $emprendimiento->nombre }}" class="img-fluid h-100" style="object-fit: cover;">
                    </div>
                @else
                    <div class="col-md-4 bg-primary-gradient d-flex align-items-center justify-content-center" style="min-height: 300px;">
                        <span class="text-white fs-1">🏪</span>
                    </div>
                @endif

                <div class="col-md-8">
                    <div class="card-body p-4">
                        <div class="d-flex flex-wrap gap-2 mb-3">
                            @if($emprendimiento->categoria)
                                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2">
                                    {{ $emprendimiento->categoria->nombre }}
                                </span>
                            @endif
                            <span class="badge bg-secondary text-uppercase">
                                {{ $emprendimiento->tipo }}
                            </span>
                        </div>

                        <h1 class="display-5 fw-bold mb-3">{{ $emprendimiento->nombre }}</h1>

                        @if($emprendimiento->descripcion)
                            <p class="text-muted mb-4">{{ $emprendimiento->descripcion }}</p>
                        @endif

                        <div class="d-flex flex-column gap-2">
                            @if($emprendimiento->horario)
                                <div class="d-flex align-items-center bg-light p-2 rounded">
                                    <i class="bi bi-clock-fill text-primary me-2"></i>
                                    <span>{{ $emprendimiento->horario }}</span>
                                </div>
                            @endif

                            @if($emprendimiento->ubicacion)
                                <div class="d-flex align-items-center bg-light p-2 rounded">
                                    <i class="bi bi-geo-alt-fill text-primary me-2"></i>
                                    <span>{{ $emprendimiento->ubicacion }}</span>
                                </div>
                            @endif

                            @if($emprendimiento->responsable)
                                <div class="d-flex align-items-center bg-light p-2 rounded">
                                    <i class="bi bi-person-fill text-primary me-2"></i>
                                    <span>Responsable: {{ $emprendimiento->responsable }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Productos del emprendimiento --}}
        <div class="mb-4">
            <h2 class="fw-bold mb-1">Productos</h2>
            <p class="text-muted">Explora los productos disponibles de este emprendimiento</p>
        </div>

        @if($emprendimiento->productos->count() > 0)
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach($emprendimiento->productos as $producto)
                    <div class="col">
                        <x-producto-card :producto="$producto" />
                    </div>
                @endforeach
            </div>
        @else
            <div class="card border-0 shadow p-5 text-center">
                <div class="fs-1 mb-3">📦</div>
                <h3 class="fw-bold mb-2">No hay productos disponibles</h3>
                <p class="text-muted">Este emprendimiento aún no ha publicado productos.</p>
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
