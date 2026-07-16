@props(['emprendimiento'])

<div class="card card-hover h-100 border-0 shadow">
    @if($emprendimiento->logo)
        <img src="{{ $emprendimiento->logo }}" alt="{{ $emprendimiento->nombre }}" class="card-img-top" style="height: 200px; object-fit: cover;">
    @else
        <div class="bg-primary-gradient d-flex align-items-center justify-content-center" style="height: 200px;">
            <span class="text-white fs-1">🏪</span>
        </div>
    @endif

    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            @if($emprendimiento->categoria)
                <span class="badge badge-custom bg-primary bg-opacity-10 text-primary">
                    {{ $emprendimiento->categoria->nombre }}
                </span>
            @endif
            <span class="badge bg-secondary text-capitalize">
                {{ $emprendimiento->tipo }}
            </span>
        </div>

        <h5 class="card-title fw-bold mb-3">{{ $emprendimiento->nombre }}</h5>

        @if($emprendimiento->ubicacion)
            <p class="card-text text-muted mb-2">
                <i class="bi bi-geo-alt-fill text-primary me-2"></i>{{ $emprendimiento->ubicacion }}
            </p>
        @endif

        @if($emprendimiento->horario)
            <p class="card-text text-muted mb-3">
                <i class="bi bi-clock-fill text-primary me-2"></i>{{ $emprendimiento->horario }}
            </p>
        @endif

        <a href="{{ route('emprendimientos.show', $emprendimiento->slug) }}"
           class="btn btn-primary-custom w-100 mt-3">
            Ver Perfil
        </a>
    </div>
</div>
