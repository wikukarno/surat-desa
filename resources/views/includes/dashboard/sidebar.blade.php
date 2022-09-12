@if (Auth::user()->roles == 'Lurah')
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
  
  <!-- Brand Logo -->
  <a href="{{ route('home') }}" class="brand-link">
    <img src="{{ asset('assets/images/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Surat Desa Sorek</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        @if (Auth::user()->foto_profile == null)
            <img src="{{ asset('assets/images/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
        @else
            <img src="{{ Storage::url(Auth::user()->foto_profile) }}" class="img-circle elevation-2" alt="User Image">
        @endif
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
          <a href="#" class="nav-link {{ (request()->is('pages/dashboard/lurah') ? 'active' : '') }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
		<li class="nav-item menu-open">
          <a href="{{ route('sku-lurah.index') }}" class="nav-link {{ (request()->is('pages/dashboard/lurah/sku') ? 'active' : '') }}">
            <i class="nav-icon fas fa-file"></i>
            <p>
              SK Usaha
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="{{ route('skp-lurah.index') }}" class="nav-link {{ (request()->is('pages/dashboard/lurah/skp')) ? 'active' : ''  }}">
            <i class="nav-icon fas fa-file"></i>
            <p>
              SK Pemakaman
            </p>
          </a>
        </li>

        <li class="nav-item menu-open">
          <a href="{{ route('sktm-lurah.index') }}" class="nav-link {{ (request()->is('pages/dashboard/lurah/sktm')) ? 'active' : ''  }}">
            <i class="nav-icon fas fa-file"></i>
            <p>
              SK Tidak Mampu
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Staff & Penduduk
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Akun
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link" data-toggle="modal" data-target="#logoutModal">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
@endif

@if (Auth::user()->roles == 'Staff')
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
  
  <!-- Brand Logo -->
  <a href="{{ route('home') }}" class="brand-link">
    <img src="{{ asset('assets/images/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Surat Desa Sorek</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        @if (Auth::user()->foto_profile == null)
            <img src="{{ asset('assets/images/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
        @else
            <img src="{{ Storage::url(Auth::user()->foto_profile) }}" class="img-circle elevation-2" alt="User Image">
        @endif
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
          <a href="#" class="nav-link {{ (request()->is('pages/dashboard/staff') ? 'active' : '') }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="{{ route('sku-staff.index') }}" class="nav-link {{ (request()->is('pages/dashboard/staff/sku') ? 'active' : '') }}">
            <i class="nav-icon fas fa-file"></i>
            <p>
              SK Usaha
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="{{ route('skp-staff.index') }}" class="nav-link {{ (request()->is('pages/dashboard/staff/skp')) ? 'active' : ''  }}">
            <i class="nav-icon fas fa-file"></i>
            <p>
              SK Pemakaman
            </p>
          </a>
        </li>

        <li class="nav-item menu-open">
          <a href="{{ route('sktm-staff.index') }}" class="nav-link {{ (request()->is('pages/dashboard/staff/sktm')) ? 'active' : ''  }}">
            <i class="nav-icon fas fa-file"></i>
            <p>
              SK Tidak Mampu
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="{{ route('data-penduduk.index') }}" class="nav-link {{ (request()->is('pages/dashboard/staff/penduduk') ? 'active' : '') }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Staff & Penduduk
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="{{ route('staff.akun') }}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Akun
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link" data-toggle="modal" data-target="#logoutModal">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
@endif

@if (Auth::user()->roles == 'User')
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
  
  <!-- Brand Logo -->
  <a href="{{ route('home') }}" class="brand-link">
    <img src="{{ asset('assets/images/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Surat Desa Sorek</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        @if (Auth::user()->foto_profile == null)
            <img src="{{ asset('assets/images/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
        @else
            <img src="{{ Storage::url(Auth::user()->foto_profile) }}" class="img-circle elevation-2" alt="User Image">
        @endif
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
          <a href="{{ route('user.dashboard') }}" class="nav-link {{ (request()->is('pages/dashboard/user')) ? 'active' : ''  }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item menu-open">
          <a href="{{ route('sku.index') }}" class="nav-link {{ (request()->is('pages/dashboard/user/sku')) ? 'active' : ''  }}">
            <i class="nav-icon fas fa-file"></i>
            <p>
              SK Usaha
            </p>
          </a>
        </li>

        <li class="nav-item menu-open">
          <a href="{{ route('skp.index') }}" class="nav-link {{ (request()->is('pages/dashboard/user/skp')) ? 'active' : ''  }}">
            <i class="nav-icon fas fa-file"></i>
            <p>
              SK Pemakaman
            </p>
          </a>
        </li>

        <li class="nav-item menu-open">
          <a href="{{ route('sktm.index') }}" class="nav-link {{ (request()->is('pages/dashboard/user/sktm')) ? 'active' : ''  }}">
            <i class="nav-icon fas fa-file"></i>
            <p>
              SK Tidak Mampu
            </p>
          </a>
        </li>

        <li class="nav-item menu-open">
          <a href="{{ route('user.akun') }}" class="nav-link {{ (request()->is('pages/dashboard/user/akun')) ? 'active' : ''  }}">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Akun
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link" data-toggle="modal" data-target="#logoutModal">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>
@endif