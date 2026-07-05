<div class="mb-3">

    <label class="form-label">
        Nombre de la categoría
    </label>

    <input
        type="text"
        name="nombre"
        class="form-control @error('nombre') is-invalid @enderror"
        value="{{ old('nombre', $categoria->nombre ?? '') }}"
        placeholder="Ejemplo: Bebidas">

    @error('nombre')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror

</div>

<div class="d-flex justify-content-end gap-2">

    <a href="{{ route('admin.categorias.index') }}"
       class="btn btn-secondary">
        Cancelar
    </a>

    <button class="btn btn-primary">
        <i class="bi bi-save"></i>

        Guardar
    </button>

</div>