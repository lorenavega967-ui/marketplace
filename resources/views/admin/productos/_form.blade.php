<div class="row">

    <div class="col-md-6 mb-3">
        <label class="form-label">Emprendimiento</label>
        <select name="emprendimiento_id"
                class="form-select @error('emprendimiento_id') is-invalid @enderror"
                required>
            <option value="">Seleccione...</option>

            @foreach($emprendimientos as $emprendimiento)
                <option value="{{ $emprendimiento->id }}"
                    @selected(old('emprendimiento_id', $producto->emprendimiento_id ?? '') == $emprendimiento->id)>
                    {{ $emprendimiento->nombre }}
                </option>
            @endforeach
        </select>

        @error('emprendimiento_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Nombre</label>
        <input type="text"
               name="nombre"
               class="form-control @error('nombre') is-invalid @enderror"
               value="{{ old('nombre', $producto->nombre ?? '') }}"
               required>

        @error('nombre')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Precio</label>
        <input type="number"
               name="precio"
               class="form-control @error('precio') is-invalid @enderror"
               value="{{ old('precio', $producto->precio ?? '') }}"
               min="0"
               step="0.01"
               required>

        @error('precio')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Imagen</label>
        <input type="text"
               name="imagen"
               class="form-control @error('imagen') is-invalid @enderror"
               value="{{ old('imagen', $producto->imagen ?? '') }}"
               placeholder="URL o ruta de la imagen">

        @error('imagen')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12 mb-3">
        <label class="form-label">Descripcion</label>
        <textarea name="descripcion"
                  class="form-control @error('descripcion') is-invalid @enderror"
                  rows="3">{{ old('descripcion', $producto->descripcion ?? '') }}</textarea>

        @error('descripcion')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12 mb-3">
        <div class="form-check form-switch">
            <input type="hidden" name="disponible" value="0">
            <input class="form-check-input"
                   type="checkbox"
                   role="switch"
                   id="disponible"
                   name="disponible"
                   value="1"
                   @checked(old('disponible', $producto->disponible ?? true))>
            <label class="form-check-label" for="disponible">
                Disponible
            </label>
        </div>
    </div>

</div>

<hr>

<div class="text-end">
    <a href="{{ route('admin.productos.index') }}" class="btn btn-secondary">
        Cancelar
    </a>

    <button class="btn btn-primary">
        <i class="bi bi-save"></i>
        Guardar
    </button>
</div>
