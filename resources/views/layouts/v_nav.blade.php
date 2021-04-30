<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
         <li class="nav-item"><a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : ''}}"><i class="nav-icon fas fa-home"></i><p>Home</p></a></li>
    {{-- <li class="nav-item menu-open">
      <a href="/dashboard" class="nav-link active">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Dashboard
        </p>
      </a>
    </li> --}}
    <li class="nav-item">
      <a href="#" class="nav-link {{ request()->is('#') ? 'active' : ''}}">
        <i class="nav-icon fas fa-table"></i>
        <p>
          Tables
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="/dashboard/user" class="nav-link {{ request()->is('dashboard/user') ? 'active' : ''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>Siswa</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/dashboard/kelas" class="nav-link {{ request()->is('dashboard/kelas') ? 'active' : ''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>Kelas</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/dashboard/spp" class="nav-link {{ request()->is('dashboard/spp') ? 'active' : ''}}">
            <i class="far fa-circle nav-icon"></i>
            <p>Spp</p>
          </a>
        </li>
        <li class="nav-item">
            <a href="{{  Route('dashboard.petugas')  }}" class="nav-link {{ request()->is('dashboard/petugas') ? 'active' : ''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>{{ __('Data Petugas') }}</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{  Route('dashboard.siswa')  }}" class="nav-link {{ request()->is('dashboard/siswa') ? 'active' : ''}}">
              <i class="far fa-circle nav-icon"></i>
              <p>{{ __('Data User') }}</p>
            </a>
          </li>
      </ul>
      <li class="nav-item"><a href="{{ Route('dashboard.profil') }}" class="nav-link {{ request()->is('dashboard/profil') ? 'active' : ''}}"><i class="nav-icon fas fa-user-cog"></i><p>Profil</p></a></li>
    <li class="nav-item menu-open">
      <a class="nav-link" href="{{ route('logout') }}"
      onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
       {{ __('Logout') }}
        <i class="nav-icon fas fa-eercast"></i>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    </li>
  </nav>
