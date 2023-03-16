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
          <li class="nav-item">
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
                  <li><a href="{{ route('admin.index') }}" data-key="t-login"><i class='bx bxs-user-rectangle'></i> Admin</a></li>
                  <li><a href="{{ route('petugas.index') }}" data-key="t-login"><i class='bx bxs-user-account'></i> Petugas</a></li>
                  <li><a href="{{ route('masyarakat.index') }}" data-key="t-register"><i class='bx bx-user' ></i> Masyarakat</a></li>
              </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('berita.index') }}">
                <i class='bx bxs-news'></i>
                <span data-key="t-horizontal">Berita</span>
            </a>
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