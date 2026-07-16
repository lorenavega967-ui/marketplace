@props(['noticia'])

<div class="itse-card">
    @if($noticia->imagen)
        <img src="{{ $noticia->imagen }}" alt="{{ $noticia->titulo }}" class="itse-card-image w-100" style="height: 200px;">
    @else
        <div class="bg-primary-gradient d-flex align-items-center justify-content-center itse-card-image w-100" style="height: 200px;">
            <span class="text-white fs-1">📰</span>
        </div>
    @endif

    <div class="p-4">
        @if($noticia->fecha_evento)
            <div class="itse-date">
                {{ $noticia->fecha_evento->format('d M') }}
            </div>
        @elseif($noticia->created_at)
            <div class="itse-date">
                {{ $noticia->created_at->format('d M') }}
            </div>
        @endif

        <h5 class="itse-card-title">{{ $noticia->titulo }}</h5>

        <p class="itse-card-description">
            {{ Str::limit(strip_tags($noticia->contenido), 150) }}
        </p>

        <a href="{{ route('noticias.show', $noticia->slug) }}"
           class="btn btn-itse-pill">
            Leer más
        </a>
    </div>
</div>
