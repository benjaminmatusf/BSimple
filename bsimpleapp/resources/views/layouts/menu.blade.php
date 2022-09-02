<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
      <i class=" fas fa-building"></i><span>Inicio</span>
    </a>
    @can('ver-usuario')
    <a class="nav-link" href="/usuarios">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>
    @endcan
    @can('ver-rol')
    <a class="nav-link" href="/roles">
        <i class=" fas fa-user-lock"></i><span>Roles</span>
    </a>
    @endcan
    @can('ver-proveedor')
    <a class="nav-link" href="/proveedors">
        <i class="fas fa-hand-holding"></i><span>Proveedores</span>
    </a>
    @endcan
    @can('ver-cliente')
    <a class="nav-link" href="/clientes">
         <i class="fas fa-store"></i><span>Clientes</span>
    </a>
    @endcan
    @can('ver-producto')
    <a class="nav-link" href="/productos">
        <i class="fas fa-fish"></i><span>Productos</span>
    </a>
    @endcan
    @can('ver-compra')
    <a class="nav-link" href="/compras">
         <i class="fas fa-shopping-cart"></i><span>Compras</span>
    </a>
    @endcan
    @can('ver-venta')
    <a class="nav-link" href="/ventas">
         <i class="fas fa-handshake"></i><span>Ventas</span>
    </a>
    @endcan
</li>
