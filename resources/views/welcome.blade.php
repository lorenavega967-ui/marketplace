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

    {{-- Hero Section --}}
    <header class="position-relative" style="margin-top: 70px; min-height: calc(100vh - 70px); background: var(--bg-lighter);">
        <div class="container position-relative" style="z-index: 2; min-height: calc(100vh - 70px); display: flex; align-items: center;">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="slide-up">
                        <h1 class="display-3 fw-bold mb-4" style="color: var(--text-primary); line-height: 1.2;">
                            Emprendimientos<br>
                            <span style="color: var(--itse-yellow);">ITSE Panamá</span>
                        </h1>
                        <p class="lead mb-5" style="color: var(--text-secondary); font-size: 1.25rem; line-height: 1.75;">
                            Descubre los negocios y productos de estudiantes y emprendedores invitados, todo en un solo lugar. Conecta, innova y crece con nuestra comunidad emprendedora.
                        </p>
                        <div class="d-flex gap-3 flex-wrap">
                            <a href="{{ route('emprendimientos.index') }}" class="btn btn-hero-circle">
                                Ver Emprendedores
                            </a>
                            <a href="{{ route('productos.index') }}" class="btn btn-hero-circle">
                                Ver Productos
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="hero-collage-container">
                        <!-- Glow effect under the collage -->
                        <div class="hero-collage-bg-glow"></div>

                        <!-- Overlapping images -->
                        <div class="hero-collage-item hero-collage-item-1">
                            <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=400&h=500&fit=crop" alt="Estudiantes">
                        </div>
                        <div class="hero-collage-item hero-collage-item-2">
                            <img src="https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?w=360&h=440&fit=crop" alt="Emprendedores">
                        </div>
                        <div class="hero-collage-item hero-collage-item-3">
                            <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=320&h=400&fit=crop" alt="Colaboración">
                        </div>
                        <div class="hero-collage-item hero-collage-item-4">
                            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=280&h=360&fit=crop" alt="Innovación">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="container itse-section">
        {{-- Emprendimientos Destacados --}}
        @if($emprendimientosDestacados->count() > 0)
            <section class="mb-5 slide-up">
                <div class="mb-4">
                    <h2 class="itse-section-title">Emprendimientos Destacados</h2>
                    <p class="itse-section-subtitle">Conoce los negocios más destacados de nuestra comunidad</p>
                </div>
                <div class="itse-grid">
                    @foreach($emprendimientosDestacados as $emprendimiento)
                        <x-emprendimiento-card :emprendimiento="$emprendimiento" />
                    @endforeach
                </div>
            </section>
        @endif

        {{-- Productos Recientes --}}
        @if($productosRecientes->count() > 0)
            <section class="mb-5 slide-up">
                <div class="mb-4">
                    <h2 class="itse-section-title">Productos Recientes</h2>
                    <p class="itse-section-subtitle">Explora los últimos productos agregados</p>
                </div>
                
                <div class="product-carousel-wrapper position-relative">
                    <button class="carousel-btn-prev" id="productosPrevBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                        </svg>
                    </button>
                    
                    <div class="product-carousel-track-container overflow-hidden">
                        <div class="product-carousel-track d-flex gap-3" id="productosCarouselTrack">
                            @foreach($productosRecientes as $producto)
                                <div class="product-carousel-item flex-shrink-0">
                                    <a href="{{ route('productos.index') }}" class="product-card text-decoration-none">
                                        <div class="product-card-image-wrapper">
                                            @if($producto->imagen)
                                                <img src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}" class="product-card-image">
                                            @else
                                                <div class="bg-primary-gradient d-flex align-items-center justify-content-center product-card-image">
                                                    <span class="text-white fs-1">📦</span>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="product-card-content">
                                            <div class="product-card-category">
                                                {{ $producto->emprendimiento->categoria->nombre ?? 'Sin categoría' }}
                                            </div>
                                            <h5 class="product-card-name">{{ $producto->nombre }}</h5>
                                            <div class="product-card-price">${{ number_format($producto->precio, 2) }}</div>
                                            <div class="product-card-emprendedor">
                                                {{ $producto->emprendimiento->nombre }}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <button class="carousel-btn-next" id="productosNextBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </button>
                </div>
                
                <div class="mt-4">
                    <a href="{{ route('productos.index') }}" class="btn btn-itse-pill">
                        Ver todos
                    </a>
                </div>
            </section>
        @endif
    </main>

    {{-- Footer --}}
    <footer id="contacto" class="itse-footer">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-5">
                <div>
                    <div class="d-flex align-items-center mb-4">
                        <div class="bg-primary-gradient text-white rounded d-flex align-items-center justify-content-center me-2" style="width: 40px; height: 40px;">
                            <span class="fw-bold">IT</span>
                        </div>
                        <span class="fw-bold fs-5">Marketplace ITSE</span>
                    </div>
                    <p class="itse-footer-contact" style="line-height: 1.75;">
                        Plataforma oficial de emprendimiento del Instituto Técnico Superior de Panamá. Conectamos estudiantes y emprendedores con oportunidades reales.
                    </p>
                    <div class="d-flex gap-3 mt-4">
                        <a href="#" class="itse-footer-link" style="font-size: 1.5rem;"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="itse-footer-link" style="font-size: 1.5rem;"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>
                <div>
                    <h5 class="itse-footer-title">Enlaces Rápidos</h5>
                    <a href="{{ route('home') }}" class="itse-footer-link">Inicio</a>
                    <a href="{{ route('productos.index') }}" class="itse-footer-link">Productos</a>
                    <a href="{{ route('emprendimientos.index') }}" class="itse-footer-link">Emprendedores</a>
                    <a href="{{ route('noticias.index') }}" class="itse-footer-link">Noticias</a>
                    <a href="#categorias" class="itse-footer-link">Categorías</a>
                </div>
                <div>
                    <h5 class="itse-footer-title">Recursos</h5>
                    <a href="#" class="itse-footer-link">Sobre Nosotros</a>
                </div>
                <div>
                    <h5 class="itse-footer-title">Contacto</h5>
                    <p class="itse-footer-contact">
                        <span style="color: var(--itse-yellow);">📍</span> Ciudad de Panamá, Panamá
                    </p>
                </div>
            </div>
            <div class="itse-footer-bottom">
                <p>&copy; {{ date('Y') }} Marketplace ITSE Panamá. Todos los derechos reservados.</p>
                <p class="mt-2">Desarrollado con ❤️ para la comunidad emprendedora del ITSE</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.querySelector('.navbar');
            if (navbar) {
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 50) {
                        navbar.classList.add('scrolled');
                    } else {
                        navbar.classList.remove('scrolled');
                    }
                });
            }

            // Product Carousel Logic
            const track = document.getElementById('productosCarouselTrack');
            const prevBtn = document.getElementById('productosPrevBtn');
            const nextBtn = document.getElementById('productosNextBtn');
            
            if (track && prevBtn && nextBtn) {
                let index = 0;
                
                function getItemsPerSlide() {
                    const width = window.innerWidth;
                    if (width > 1200) return 4;
                    if (width > 992) return 3;
                    if (width > 768) return 2;
                    return 1;
                }
                
                function updateCarousel() {
                    const itemsPerSlide = getItemsPerSlide();
                    const items = track.children;
                    const maxIndex = Math.max(0, items.length - itemsPerSlide);
                    if (index > maxIndex) index = maxIndex;
                    if (index < 0) index = 0;
                    
                    if (items.length > 0) {
                        const itemWidth = items[0].getBoundingClientRect().width;
                        const gap = 12; // matches CSS gap-3
                        const amountToMove = index * (itemWidth + gap);
                        track.style.transform = `translateX(-${amountToMove}px)`;
                    }
                    
                    // Update opacity and interactivity of buttons
                    prevBtn.style.opacity = index === 0 ? '0.3' : '1';
                    prevBtn.style.pointerEvents = index === 0 ? 'none' : 'auto';
                    nextBtn.style.opacity = index === maxIndex ? '0.3' : '1';
                    nextBtn.style.pointerEvents = index === maxIndex ? 'none' : 'auto';
                }
                
                prevBtn.addEventListener('click', () => {
                    index--;
                    updateCarousel();
                });
                
                nextBtn.addEventListener('click', () => {
                    index++;
                    updateCarousel();
                });
                
                window.addEventListener('resize', updateCarousel);
                // Initial setup delay to ensure elements are sized
                setTimeout(updateCarousel, 150);
            }
        });
    </script>

</body>
</html>