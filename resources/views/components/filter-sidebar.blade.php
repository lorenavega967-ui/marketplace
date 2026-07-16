@props(['categorias', 'tipos' => ['fijo', 'ambulante', 'invitado']])

<div class="card border-0 shadow sticky-top" style="top: 100px;">
    <div class="card-body">
        <div class="d-flex align-items-center mb-4">
            <i class="bi bi-funnel-fill text-primary me-2"></i>
            <h5 class="fw-bold mb-0">Filtros</h5>
        </div>

        <form method="GET" action="{{ request()->url() }}">
            {{-- Búsqueda --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Buscar</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text"
                           name="buscar"
                           value="{{ request('buscar') }}"
                           placeholder="Nombre, descripción..."
                           class="form-control">
                </div>
            </div>

            {{-- Categoría --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Categoría</label>
                <select name="categoria" class="form-select">
                    <option value="">Todas las categorías</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}"
                                {{ request('categoria') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Tipo (para emprendimientos) --}}
            @if(isset($tipos))
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tipo</label>
                    <select name="tipo" class="form-select">
                        <option value="">Todos los tipos</option>
                        @foreach($tipos as $tipo)
                            <option value="{{ $tipo }}"
                                    {{ request('tipo') == $tipo ? 'selected' : '' }}>
                                {{ ucfirst($tipo) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif

            {{-- Tipo de producto (combo/individual) --}}
            @if(request()->route()->getName() === 'productos.index')
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tipo de producto</label>
                    <select name="tipo" class="form-select">
                        <option value="">Todos</option>
                        <option value="individual" {{ request('tipo') === 'individual' ? 'selected' : '' }}>
                            Individual
                        </option>
                        <option value="combo" {{ request('tipo') === 'combo' ? 'selected' : '' }}>
                            Combo
                        </option>
                    </select>
                </div>

                {{-- Precio --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Rango de precio</label>
                    <div class="row g-2">
                        <div class="col-6">
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number"
                                       name="precio_min"
                                       value="{{ request('precio_min') }}"
                                       placeholder="Mín"
                                       step="0.01"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number"
                                       name="precio_max"
                                       value="{{ request('precio_max') }}"
                                       placeholder="Máx"
                                       step="0.01"
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <button type="submit" class="btn btn-primary-custom w-100 mb-2">
                Aplicar Filtros
            </button>

            <a href="{{ request()->url() }}" class="btn btn-outline-secondary w-100">
                Limpiar filtros
            </a>
        </form>
    </div>
</div>
