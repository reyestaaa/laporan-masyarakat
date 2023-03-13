<!--- Sidemenu -->
<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title" data-key="t-menu">Menu Utama</li>
        <li>
            <a href="{{ route('dashboard.index') }}">
                <i class="bx bx-sticker"></i>
                <span data-key="t-dashboard">Dashboard</span>
            </a>
            {{-- @if(Auth::guard('admin')->user()->hasPermissionTo('admin_user'))
            <li>
                <a href="javascript: void(0);" class="has-arrow">
                    <i class='bx bxs-group'></i>
                    <span data-key="t-authentication">Admin</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('admin.admin-user.index') }}" data-key="t-login">Pengguna</a></li>
                    <li><a href="{{ route('admin.role.index') }}" data-key="t-register">Role</a></li>
                    <li><a href="{{ route('admin.permission.index') }}" data-key="t-register">Permission</a></li>
                </ul>
            </li>
            @endif --}}
            @if (Illuminate\Support\Facades\Auth::guard('admin')->user()->level == 'petugas')
            <li>
                <a href="{{ route('pengaduan.index') }}">
                    <i class="bx bx-home"></i>
                    <span data-key="t-horizontal">Pengaduan</span>
                </a>
            </li>
            @endif

            @if (Illuminate\Support\Facades\Auth::guard('admin')->user()->level == 'admin')
            <li>
                <a href="javascript: void(0);" class="has-arrow">
                    <i class='bx bxs-group'></i>
                    <span data-key="t-authentication">Admin</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('petugas.index') }}" data-key="t-login"><i class='bx bxs-user-account'></i> Petugas</a></li>
                    <li><a href="{{ route('masyarakat.index') }}" data-key="t-register"><i class='bx bx-user' ></i> Masyarakat</a></li>
                </ul>
            </li>
            <li class="nav-item">
              <a  href="{{ route('kategori.index') }}">
                <i class='bx bx-category'></i>
                <span data-key="t-horizontal">Kategori</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('laporan.index') }}">
                <i class='bx bxs-report' ></i>
                <span data-key="t-horizontal">Laporan</span>
              </a>
            </li>
            @endif

        </li>
    </ul>
</div>
<!-- Sidebar -->

{{-- <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="" target="_blank">
        <img src="{{ asset('/assets/img/logo.png') }}" class="navbar-brand-img h-100 rounded" alt="main_logo">
        <span class="ms-1 fs-5 font-weight-bold">
          LAPORIAN 
        </span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="{{ route('dashboard.index') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-world-2  text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        @if (Illuminate\Support\Facades\Auth::guard('admin')->user()->level == 'petugas')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/pengaduan') ? 'active' : '' }}" href="{{ route('pengaduan.index') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Pengaduan</span>
          </a>
        </li>
        @endif
        @if (Illuminate\Support\Facades\Auth::guard('admin')->user()->level == 'admin')
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/petugas') ? 'active' : '' }}" href="{{ route('petugas.index') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Petugas</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/masyarakat') ? 'active' : '' }}" href="{{ route('masyarakat.index') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-circle-08 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Masyarakat</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/kategori') ? 'active' : '' }}" href="{{ route('kategori.index') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-archive-2 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Kategori</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('admin/laporan') ? 'active' : '' }}" href="{{ route('laporan.index') }}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-calendar-grid-58 text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Laporan</span>
          </a>
        </li>
        @endif
      </ul>
    </div>
</aside> --}}