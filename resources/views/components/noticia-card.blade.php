@props(['noticia'])

<div class="card card-hover h-100 border-0 shadow">
    @if($noticia->imagen)
        <img src="{{ $noticia->imagen }}" alt="{{ $noticia->titulo }}" class="card-img-top" style="height: 180px; object-fit: cover;">
    @else
        <div class="bg-purple-gradient d-flex align-items-center justify-content-center" style="height: 180px;">
            <span class="text-white fs-1">📰</span>
        </div>
    @endif

    <div class="card-body">
        @if($noticia->fecha_evento)
            <div class="text-primary fw-semibold mb-2">
                <i class="bi bi-calendar-event me-2"></i>{{ $noticia->fecha_evento->format('d/m/Y - H:i') }}
            </div>
        @endif

        <h5 class="card-title fw-bold mb-3">{{ $noticia->titulo }}</h5>

        <p class="card-text text-muted mb-3">
            {{ Str::limit(strip_tags($noticia->contenido), 150) }}
        </p>

        @if($noticia->ubicacion_evento)
            <p class="card-text text-muted mb-3">
                <i class="bi bi-geo-alt text-primary me-2"></i>{{ $noticia->ubicacion_evento }}
            </p>
        @endif

        <a href="{{ route('noticias.show', $noticia->slug) }}"
           class="btn btn-sm btn-outline-primary">
            Leer más <i class="bi bi-arrow-right"></i>
        </a>
    </div>
</div>
