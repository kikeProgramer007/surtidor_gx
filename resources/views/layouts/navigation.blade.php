{{-- <nav x-data="{ open: false }" class="bg-white border-b border-gray-100"> --}}
    <!-- Primary Navigation Menu -->
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center">
        {{-- <img src="assets/img/logo.png" alt=""> --}}
        {{-- <x-application-logo class="block h-9 w-auto fill-current text-gray-800" /> --}}
        <img src="{{asset('img/logoLogin.png')}}" alt="" class="block h-14 w-auto fill-current text-gray-800">
        <span class="d-none d-lg-block">&nbsp; Surtidor</span>
      </a>

      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{asset('img/user.png')}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Auth::user()->name }}</h6>
              <span>{{ Auth::user()->email }}</span>
            </li>
       
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('profile.edit')}}">
                <i class="bi bi-gear"></i>
                <span>Configuración de Cuenta</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
                <a class="dropdown-item d-flex align-items-center" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Cerrar sesión</span>
                </a>

                <!-- Authentication -->
                   <form method="POST" id="logout-form" action="{{ route('logout') }}">
                    @csrf
                 
                </form>



            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->


    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
    
          <li class="nav-item">
            <a class="nav-link  {{ request()->routeIs('cliente.index') ? '' : 'collapsed'}}" href="{{ route('cliente.index') }}">
                <i class="bi bi-person"></i>
                <span>Clientes</span>
            </a>
          </li><!-- End Dashboard Nav -->
          <li class="nav-item">
            <a class="nav-link  {{ request()->routeIs('vehiculo.index') ? '' : 'collapsed'}}" href="{{ route('vehiculo.index') }}">
                <i class="bi bi-car-front-fill"></i>
                <span>Vehiculos</span>
            </a>
          </li><!-- End Dashboard Nav -->
          <li class="nav-item">
            <a class="nav-link  {{ request()->routeIs('combustible.index') ? '' : 'collapsed'}}" href="{{ route('combustible.index') }}">
            <i class="bi bi-moisture"></i>
              <span>Combustible</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  {{ request()->routeIs('tanque.index') ? '' : 'collapsed'}}" href="{{ route('tanque.index') }}">
            <i class="bi bi-speedometer"></i>
              <span>Tanques</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  {{ request()->routeIs('bomba.index') ? '' : 'collapsed'}}" href="{{ route('bomba.index') }}">
            <i class="bi bi-fuel-pump"></i>
              <span>Bombas</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  {{ request()->routeIs('proveedor.index') ? '' : 'collapsed'}}" href="{{ route('proveedor.index') }}">
              <i class="bi bi-person-plus"></i>
              <span>Proveedores</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  {{ request()->routeIs('user.index') ? '' : 'collapsed'}}" href="{{ route('user.index') }}">
              <i class="bi bi-people-fill"></i>
              <span>Usuarios</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person-fill-gear"></i><span>Empleados</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                <a class="nav-link  {{ request()->routeIs('empleado.index') ? '' : 'collapsed'}}" href="{{ route('empleado.index') }}">
                  <i class="bi bi-circle"></i><span>Empleado</span>
                </a>
              </li>
              <li>
                <a class="nav-link {{ request()->routeIs('turno.index') ? '' : 'collapsed'}}" href="{{ route('turno.index') }}">
                  <i class="bi bi-circle"></i><span>Turno</span>
                </a>
              </li>
            </ul>
          </li><!-- End Tables Nav -->
    

          <li class="nav-heading">Ventas</li>
    
          <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('venta.index') ? '' : 'collapsed'}}" href="{{ route('venta.index') }}">
              <i class="bi bi-cash-coin"></i>
              <span>Ventas</span>
            </a>
          </li>
          <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('venta.ventasrealizadas') ? '' : 'collapsed'}}" href="{{ route('venta.ventasrealizadas') }}">
              <i class="bi bi-file-earmark "></i>
              <span>Historial de Ventas</span>
            </a>
          </li><!-- End Blank Page Nav -->
        </ul>
    
      </aside><!-- End Sidebar-->

{{-- </nav> --}}
