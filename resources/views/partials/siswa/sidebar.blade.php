<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  
  <div class="sidebar-brand d-flex align-items-center justify-content-center">
    {{-- <div class="text-center d-none d-md-inline"> --}}
      <button class="rounded-circle border-0 mt-3" id="sidebarToggle"></button>
  {{-- </div> --}}
      <div class="sidebar-brand-text mx-3">SPP - Siswa</div>
  </div>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ Request::is('siswa/beranda') ? 'active' : '' }}">
    <a class="nav-link px-3 py-2" href="/siswa/beranda">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="fas fa-fw mb-1 bi bi-house-door-fill grey" viewBox="0 0 16 16">
        <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
      </svg>
      <span>Beranda</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading mt-2">
      Transaksi
  </div>

  <li class="nav-item {{ Request::is('siswa/entri*') ? 'active' : '' }}">
    <a class="nav-link px-3 py-2" href="/siswa/entri">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="fas fa-fw grey bi bi-clipboard-plus-fill" viewBox="0 0 16 16">
        <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm4.5 6V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5a.5.5 0 0 1 1 0Z"/>
      </svg>
      <span>Entri Pembayaran</span>
    </a>
  </li>
  <li class="nav-item {{ Request::is('siswa/riwayat*') ? 'active' : '' }}">
    <a class="nav-link px-3 py-2" href="/siswa/riwayat">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="fas fa-fw grey bi bi-clock-fill" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
      </svg>
      <span>Riwayat Pembayaran</span>
    </a>
  </li>
  <li class="nav-item {{ Request::is('siswa/notifikasi*') ? 'active' : '' }}">
    <a class="nav-link px-3 py-2" href="/siswa/notifikasi">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="fas fa-fw grey bi bi-file-earmark-bar-graph-fill" viewBox="0 0 16 16">
        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm.5 10v-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-2.5.5a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1zm-3 0a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-1z"/>
      </svg>
      <span>Notifikasi</span></a>
  </li>
  {{-- <li class="nav-item {{ Request::is('siswa/cs*') ? 'active' : '' }}">
    <a class="nav-link px-3 py-2" href="/siswa/cs">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="fas fa-fw grey bi bi-file-earmark-bar-graph-fill" viewBox="0 0 16 16">
        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm.5 10v-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-2.5.5a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1zm-3 0a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-1z"/>
      </svg>
      <span>Customer Service</span></a>
  </li> --}}

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  <div class="sidebar-heading mt-2">
      Pengaturan
  </div>

  <li class="nav-item {{ Request::is('siswa/profile*') ? 'active' : '' }}">
    <a class="nav-link px-3 py-2 " href="/siswa/profile">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="fas fa-fw grey bi bi-person-circle" viewBox="0 0 16 16">
        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
      </svg>
      <span>Profile</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->


</ul>