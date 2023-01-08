<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('admin/field') }}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-fw fa-tachometer-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Renfield</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('admin/field/') }}">
            <i class="fas fa-fw fa-list"></i>
            <span>Kelola Lapangan</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('admin/kelola-order') }}">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Kelola Order</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">
    
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('admin/kelola-user') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Kelola User</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
</ul>