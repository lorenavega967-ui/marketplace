@props(['producto'])

<div class="card card-hover h-100 border-0 shadow">
    @if($producto->imagen)
        <img src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}" class="card-img-top" style="height: 200px; object-fit: cover;">
    @else
        <div class="bg-secondary-gradient d-flex align-items-center justify-content-center" style="height: 200px;">
            <span class="text-white fs-1">📦</span>
        </div>
    @endif

    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            @if($producto->es_combo)
                <span class="badge badge-custom bg-warning bg-opacity-10 text-warning">
                    🎁 Combo
                </span>
            @endif
            @if(!$producto->disponible)
                <span class="badge badge-custom bg-danger bg-opacity-10 text-danger">
                    ❌ Agotado
                </span>
            @else
                <span class="badge badge-custom bg-success bg-opacity-10 text-success">
                    ✓ Disponible
                </span>
            @endif
        </div>

        <h5 class="card-title fw-bold mb-3">{{ $producto->nombre }}</h5>

        @if($producto->emprendimiento)
            <p class="card-text text-muted mb-3">
                <i class="bi bi-shop text-secondary me-2"></i>{{ $producto->emprendimiento->nombre }}
            </p>
        @endif

        <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
            <span class="fs-4 fw-bold text-secondary">
                ${{ number_format($producto->precio, 2) }}
            </span>
            @if($producto->emprendimiento)
                <a href="{{ route('emprendimientos.show', $producto->emprendimiento->slug) }}"
                   class="btn btn-sm btn-outline-primary">
                    Ver más <i class="bi bi-arrow-right"></i>
                </a>
            @endif
        </div>
    </div>
</div>
