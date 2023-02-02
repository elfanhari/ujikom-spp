{{-- SIDEBAR ADMIN --}}

@can('admin')
    
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    
    <div class="sidebar-brand d-flex align-items-center justify-content-center">
      {{-- <div class="text-center d-none d-md-inline"> --}}
        <button class="rounded-circle border-0 mt-3" id="sidebarToggle"></button>
    {{-- </div> --}}
        <div class="sidebar-brand-text mx-3">SPP - Admin</div>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data
    </div>

    <li class="nav-item {{ Request::is('admin/prodi*') ? 'active' : '' }}">
      <a class="nav-link px-3 py-2" href="/admin/prodi">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Data Prodi</span></a>
      </li>
    <li class="nav-item {{ Request::is('admin/kelas*') ? 'active' : '' }}">
      <a class="nav-link px-3 py-2" href="/admin/kelas">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Data Kelas</span></a>
      </li>
        <li class="nav-item {{ Request::is('admin/spp*') ? 'active' : '' }}">
          <a class="nav-link px-3 py-2" href="/admin/spp">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Data SPP</span></a>
          </li>
          <li class="nav-item {{ Request::is('admin/siswa*') ? 'active' : '' }}">
            <a class="nav-link px-3 py-2" href="/admin/siswa">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="fas fa-fw bi bi-people-fill" viewBox="0 0 16 16">
                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
              </svg>
              <span>Data Siswa</span></a>
          </li>
          <li class="nav-item {{ Request::is('admin/petugas*') ? 'active' : '' }}">
            <a class="nav-link px-3 py-2" href="/admin/petugas">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Data Petugas</span></a>
    </li>
    <li class="nav-item {{ Request::is('admin/admin*') ? 'active' : '' }}">
      <a class="nav-link px-3 py-2" href="/admin/admin">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Data Admin</span></a>
      </li>
      <li class="nav-item {{ Request::is('admin/pembayaran*') ? 'active' : '' }}">
        <a class="nav-link px-3 py-2 mb-2" href="/admin/pembayaran">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Data Pembayaran</span></a>
      </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Transaksi
    </div>

    <li class="nav-item {{ Request::is('admin/entri*') ? 'active' : '' }}">
      <a class="nav-link px-3 py-2 mt-2" href="/admin/entri">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Entri Pembayaran</span></a>
    </li>
    <li class="nav-item {{ Request::is('admin/history*') ? 'active' : '' }}">
      <a class="nav-link px-3 py-2" href="/admin/history">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>History Pembayaran</span></a>
    </li>
    <li class="nav-item {{ Request::is('admin/laporan*') ? 'active' : '' }}">
      <a class="nav-link px-3 py-2 mb-2" href="/admin/laporan">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Laporan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <div class="sidebar-heading">
        Pengaturan
    </div>

    <li class="nav-item {{ Request::is('admin/profile*') ? 'active' : '' }}">
      <a class="nav-link px-3 py-2 my-2" href="/admin/profile">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Profile</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
  

  </ul>

@endcan

{{-- END SIDEBAR ADMIN --}}


{{-- SIDEBAR PETUGAS --}}
@can('petugas')
    
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    
    <div class="sidebar-brand d-flex align-items-center justify-content-center">
      {{-- <div class="text-center d-none d-md-inline"> --}}
        <button class="rounded-circle border-0 mt-3" id="sidebarToggle"></button>
    {{-- </div> --}}
        <div class="sidebar-brand-text mx-3 fs-14">SPP - Petugas</div>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data
    </div>

      <li class="nav-item {{ Request::is('admin/pembayaran*') ? 'active' : '' }}">
        <a class="nav-link px-3 py-2 mb-2" href="/admin/pembayaran">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Data Pembayaran</span></a>
      </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Transaksi
    </div>

    <li class="nav-item {{ Request::is('admin/entri*') ? 'active' : '' }}">
      <a class="nav-link px-3 py-2" href="/admin/entri">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Entri Pembayaran</span></a>
    </li>
    <li class="nav-item {{ Request::is('admin/history*') ? 'active' : '' }}">
      <a class="nav-link px-3 py-2" href="/admin/history">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>History Pembayaran</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <div class="sidebar-heading">
        Pengaturan
    </div>

    <li class="nav-item {{ Request::is('admin/profile*') ? 'active' : '' }}">
      <a class="nav-link px-3 py-2 my-2" href="/admin/profile">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Profile</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
  

  </ul>

@endcan
{{-- END SIDEBAR ADMIN --}}