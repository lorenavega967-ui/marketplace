<div class="row">

    <div class="col-md-6 mb-3">

        <label class="form-label">Nombre</label>

        <input
            type="text"
            name="nombre"
            class="form-control"
            value="{{ old('nombre', $emprendimiento->nombre ?? '') }}">

    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label">Responsable</label>

        <input
            type="text"
            name="responsable"
            class="form-control"
            value="{{ old('responsable', $emprendimiento->responsable ?? '') }}">

    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label">

            Dueño

        </label>

        <select name="user_id" class="form-select">

            <option value="">Seleccione...</option>

            @foreach($usuarios as $usuario)

                <option
                    value="{{ $usuario->id }}"
                    @selected(old('user_id', $emprendimiento->user_id ?? '') == $usuario->id)>

                    {{ $usuario->name }}

                </option>

            @endforeach

        </select>

    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label">

            Categoría

        </label>

        <select name="categoria_id" class="form-select">

            <option value="">Seleccione...</option>

            @foreach($categorias as $categoria)

                <option
                    value="{{ $categoria->id }}"
                    @selected(old('categoria_id', $emprendimiento->categoria_id ?? '') == $categoria->id)>

                    {{ $categoria->nombre }}

                </option>

            @endforeach

        </select>

    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label">

            Tipo

        </label>

        <select name="tipo" class="form-select">

            <option value="fijo" @selected(old('tipo', $emprendimiento->tipo ?? '') == 'fijo')>Fijo</option>

            <option value="ambulante" @selected(old('tipo', $emprendimiento->tipo ?? '') == 'ambulante')>Ambulante</option>

            <option value="invitado" @selected(old('tipo', $emprendimiento->tipo ?? '') == 'invitado')>Invitado</option>

        </select>

    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label">

            Estado

        </label>

        <select name="estado" class="form-select">

            <option value="pendiente" @selected(old('estado', $emprendimiento->estado ?? '') == 'pendiente')>Pendiente</option>

            <option value="aprobado" @selected(old('estado', $emprendimiento->estado ?? '') == 'aprobado')>Aprobado</option>

            <option value="rechazado" @selected(old('estado', $emprendimiento->estado ?? '') == 'rechazado')>Rechazado</option>

        </select>

    </div>

    <div class="col-12 mb-3">

        <label class="form-label">

            Descripción

        </label>

        <textarea
            name="descripcion"
            class="form-control"
            rows="3">{{ old('descripcion', $emprendimiento->descripcion ?? '') }}</textarea>

    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label">

            Horario

        </label>

        <input
            type="text"
            name="horario"
            class="form-control"
            value="{{ old('horario', $emprendimiento->horario ?? '') }}">

    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label">

            Ubicación

        </label>

        <input
            type="text"
            name="ubicacion"
            class="form-control"
            value="{{ old('ubicacion', $emprendimiento->ubicacion ?? '') }}">

    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label">

            WhatsApp

        </label>

        <input
            type="text"
            name="whatsapp"
            class="form-control"
            value="{{ old('whatsapp', $emprendimiento->whatsapp ?? '') }}">

    </div>

    <div class="col-md-6 mb-3">

        <label class="form-label">

            Instagram

        </label>

        <input
            type="text"
            name="instagram"
            class="form-control"
            value="{{ old('instagram', $emprendimiento->instagram ?? '') }}">

    </div>

    <div class="col-12 mb-3">

        <label class="form-label">

            Motivo de rechazo

        </label>

        <textarea
            name="motivo_rechazo"
            class="form-control"
            rows="2">{{ old('motivo_rechazo', $emprendimiento->motivo_rechazo ?? '') }}</textarea>

    </div>

</div>

<hr>

<div class="text-end">

    <a href="{{ route('admin.emprendimientos.index') }}"
       class="btn btn-secondary">

        Cancelar

    </a>

    <button class="btn btn-primary">

        <i class="bi bi-save"></i>

        Guardar

    </button>

</div>
