<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Solicitud de Perfil Emprendedor - Marketplace ITSE</title>
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
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="mb-5">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div>
                            <h1 class="itse-section-title mb-0">Solicitud de Perfil Emprendedor</h1>
                            <p class="itse-section-subtitle mb-0">Completa el formulario para solicitar tu perfil de emprendedor. El administrador revisará tu solicitud.</p>
                        </div>
                        <a href="{{ route('home') }}" class="btn btn-outline-itse">
                            ← Volver al Inicio
                        </a>
                    </div>
                </div>

                <div class="itse-card p-5">
                    <form method="POST" action="{{ route('solicitud-emprendedor.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="nombre_completo" class="form-label fw-semibold">Nombre Completo</label>
                            <input type="text" 
                                   class="form-control @error('nombre_completo') is-invalid @enderror" 
                                   id="nombre_completo" 
                                   name="nombre_completo" 
                                   value="{{ old('nombre_completo') }}" 
                                   placeholder="Tu nombre completo"
                                   required>
                            @error('nombre_completo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label fw-semibold">Correo Electrónico</label>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   placeholder="tu@email.com"
                                   required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="telefono" class="form-label fw-semibold">Teléfono</label>
                            <input type="text" 
                                   class="form-control @error('telefono') is-invalid @enderror" 
                                   id="telefono" 
                                   name="telefono" 
                                   value="{{ old('telefono') }}" 
                                   placeholder="+507 XXXX-XXXX" 
                                   required>
                            @error('telefono')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="nombre_negocio" class="form-label fw-semibold">Nombre del Negocio</label>
                            <input type="text" 
                                   class="form-control @error('nombre_negocio') is-invalid @enderror" 
                                   id="nombre_negocio" 
                                   name="nombre_negocio" 
                                   value="{{ old('nombre_negocio') }}" 
                                   placeholder="Nombre de tu emprendimiento"
                                   required>
                            @error('nombre_negocio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="tipo" class="form-label fw-semibold">Tipo de Negocio</label>
                            <select class="form-select @error('tipo') is-invalid @enderror" 
                                    id="tipo" 
                                    name="tipo" 
                                    required>
                                <option value="">Selecciona el tipo</option>
                                <option value="fijo" {{ old('tipo') == 'fijo' ? 'selected' : '' }}>Fijo (tiene local físico)</option>
                                <option value="ambulante" {{ old('tipo') == 'ambulante' ? 'selected' : '' }}>Ambulante (sin local físico)</option>
                            </select>
                            @error('tipo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="categoria_id" class="form-label fw-semibold">Categoría</label>
                            <select class="form-select @error('categoria_id') is-invalid @enderror" 
                                    id="categoria_id" 
                                    name="categoria_id">
                                <option value="">Selecciona una categoría (opcional)</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" 
                                            {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('categoria_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="descripcion_negocio" class="form-label fw-semibold">Descripción del Negocio</label>
                            <textarea class="form-control @error('descripcion_negocio') is-invalid @enderror" 
                                      id="descripcion_negocio" 
                                      name="descripcion_negocio" 
                                      rows="4" 
                                      placeholder="Describe tu negocio, productos o servicios que ofreces..."
                                      required>{{ old('descripcion_negocio') }}</textarea>
                            @error('descripcion_negocio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="motivo" class="form-label fw-semibold">¿Por qué deberías tener un espacio en el Marketplace ITSE?</label>
                            <textarea class="form-control @error('motivo') is-invalid @enderror" 
                                      id="motivo" 
                                      name="motivo" 
                                      rows="4" 
                                      placeholder="Explica por qué eres un buen candidato para tener tu emprendimiento en nuestra plataforma..."
                                      required>{{ old('motivo') }}</textarea>
                            @error('motivo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="experiencia_previa" class="form-label fw-semibold">Experiencia Previa (opcional)</label>
                            <textarea class="form-control @error('experiencia_previa') is-invalid @enderror" 
                                      id="experiencia_previa" 
                                      name="experiencia_previa" 
                                      rows="3" 
                                      placeholder="Cuéntanos sobre tu experiencia previa en emprendimiento...">{{ old('experiencia_previa') }}</textarea>
                            @error('experiencia_previa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="imagen_referencial" class="form-label fw-semibold">Imagen Referencial (opcional)</label>
                            <input type="text" 
                                   class="form-control @error('imagen_referencial') is-invalid @enderror" 
                                   id="imagen_referencial" 
                                   name="imagen_referencial" 
                                   value="{{ old('imagen_referencial') }}" 
                                   placeholder="URL de imagen o logo tentativo">
                            @error('imagen_referencial')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-itse-pill flex-grow-1">
                                Enviar Solicitud
                            </button>
                            <a href="{{ route('home') }}" class="btn btn-outline-itse flex-grow-1">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
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
