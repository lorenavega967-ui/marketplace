<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Marketplace') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <nav class="navbar navbar-expand-sm navbar-light bg-white border-bottom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">Marketplace</a>
            <div class="ms-auto">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary btn-sm">Mi panel</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm me-2">Iniciar sesión</a>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Registrarse</a>
                @endauth
            </div>
        </div>
    </nav>

    <header class="bg-light py-5 border-bottom">
        <div class="container text-center">
            <h1 class="fw-bold mb-3">Emprendimientos de la comunidad universitaria</h1>
            <p class="text-muted col-lg-8 mx-auto">
                Descubre los kioscos, negocios y productos de estudiantes y emprendedores invitados,
                todo en un solo lugar.
            </p>
        </div>
    </header>

    <main class="container py-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 text-center p-3">
                    <div class="card-body">
                        <h5 class="card-title">Emprendimientos</h5>
                        <p class="card-text text-muted">
                            Explora los negocios con local fijo y los que venden sin un punto físico.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 text-center p-3">
                    <div class="card-body">
                        <h5 class="card-title">Productos</h5>
                        <p class="card-text text-muted">
                            Consulta precios, disponibilidad y fotos antes de visitar un kiosco.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 text-center p-3">
                    <div class="card-body">
                        <h5 class="card-title">Emprendedores invitados</h5>
                        <p class="card-text text-muted">
                            Conoce a los emprendedores externos que participan en las ferias de la universidad.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="text-center text-muted py-4 border-top">
        <small>&copy; {{ date('Y') }} Marketplace Universitario</small>
    </footer>

</body>
</html>