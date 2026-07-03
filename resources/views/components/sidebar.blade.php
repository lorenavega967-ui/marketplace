<div class="sidebar d-flex flex-column">

    <div class="p-4 border-bottom">

        <h4 class="fw-bold text-white mb-0">
            Marketplace
        </h4>

        <small class="text-white-50">
            Panel Administrador
        </small>

    </div>

    <div class="p-3">

        <a href="{{ route('admin.dashboard') }}"
           class="menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid-fill"></i>
            Dashboard
        </a>

        <a href="{{ route('admin.usuarios.index') }}"
           class="menu-link {{ request()->routeIs('admin.usuarios.*') ? 'active' : '' }}">
            <i class="bi bi-people-fill"></i>
            Usuarios
        </a>

        <a href="{{ route('admin.emprendimientos.index') }}"
           class="menu-link {{ request()->routeIs('admin.emprendimientos.*') ? 'active' : '' }}">
            <i class="bi bi-shop"></i>
            Emprendimientos
        </a>

        <a href="{{ route('admin.productos.index') }}"
           class="menu-link {{ request()->routeIs('admin.productos.*') ? 'active' : '' }}">
            <i class="bi bi-box-seam"></i>
            Productos
        </a>

        <a href="{{ route('admin.categorias.index') }}"
           class="menu-link {{ request()->routeIs('admin.categorias.*') ? 'active' : '' }}">
            <i class="bi bi-tags-fill"></i>
            Categorias
        </a>

    </div>

    <div class="mt-auto p-3">

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button class="btn btn-light w-100">
                <i class="bi bi-box-arrow-right"></i>
                Cerrar sesion
            </button>

        </form>

    </div>

</div>
