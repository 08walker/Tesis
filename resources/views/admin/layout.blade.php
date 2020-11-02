<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>@yield('meta-title', config('app.name')."| AdminLTE 3")</title>  
  
  <meta name="description" content="@yield('meta-description','Este la Tesis de David')">  
  <!-- DataTables -->
<link rel="stylesheet" href="/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
  @stack('styles')

  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">

</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="/home" class="navbar-brand">
        <img src="/img/tabacuba.jpg" alt="AdminLTE Logo" class="brand-image  elevation-3"
             style="opacity: .8">
        {{--<span class="brand-text font-weight-light">{{config('app.name')}}</span>--}}
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          @guest
          <li class="nav-item">
            <a href="/" class="nav-link">Inicio</a>
          </li>
          <li class="nav-item">
            <a href="/contacto" class="nav-link">Contacto</a>
          </li>
          @else
          <li class="nav-item">
            <a href="/home" class="nav-link">Inicio</a>
          </li>
          
          
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Division P.A.</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              
              @can('view',new \App\Provincia)
                <li>
                  <a href="{{ route('provincias') }}" class="dropdown-item">Provincias </a>
                </li>
              @endcan

              @can('view',new \App\Municipio)
                <li>
                  <a href="{{ route('municipios') }}" class="dropdown-item">Municipios </a>
                </li>
              @endcan
            </ul>
          </li>
          

          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Org.</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              
              @can('view',new \App\Organizacion)
                <li>
                  <a href="{{ route('organizaciones') }}" class="dropdown-item">Organizaciones </a>
                </li>
              @endcan

              @can('view',new \App\Tercero)
                <li>
                  <a href="{{ route('terceros') }}" class="dropdown-item">Terceros</a>
                </li>
              @endcan

              @can('view',new \App\Lugar)
                <li>
                  <a href="{{ route('lugares') }}" class="dropdown-item">Lugares</a>
                </li>
              @endcan

            </ul>
          </li>

          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Transporte</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              
              @can('view',new \App\Chofer)
                <li>
                  <a href="{{ route('choferes') }}" class="dropdown-item">Choferes </a>
                </li>
              @endcan

              @can('view',new \App\Equipo)
                <li>
                  <a href="{{ route('equipos') }}" class="dropdown-item">Equipos</a>
                </li>
              @endcan

              @can('view',new \App\Envase)
                <li>
                  <a href="{{ route('envases') }}" class="dropdown-item">Envases</a>
                </li>
              @endcan

              @can('view',new \App\Arrastre)
                <li>
                  <a href="{{ route('arrastres') }}" class="dropdown-item">Arrastres</a>
                </li>
              @endcan

              @can('view',new \App\TipoEquipo) 
                <li>
                  <a href="{{ route('tipoequipo') }}" class="dropdown-item">Tipo Equipo</a>
                </li>
              @endcan

              @can('view',new \App\TipoArrastre)
                <li>
                  <a href="{{ route('tipoarrastre') }}" class="dropdown-item">Tipo Arrastre</a>
                </li>
              @endcan

            </ul>
          </li>

          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Otros</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              @can('view',new \App\TipoUnidadMedida)
                <li>
                  <a href="{{ route('tipounidad') }}" class="dropdown-item">Tipo Unidad de medida </a>
                </li>
              @endcan

              @can('view',new \App\UnidadMedida)
                <li>
                  <a href="{{ route('unidadmedida') }}" class="dropdown-item">Unidad de medida</a>
                </li>
              @endcan

              {{-- @can('view',new \App\Transportacion) --}}
                <li>
                  <a href="{{ route('transportaciones') }}" class="dropdown-item">Transportacion</a>
                </li>
              {{-- @endcan --}}

              @can('view',new \App\TipoHito)
                <li>
                  <a href="{{ route('tipohito') }}" class="dropdown-item">Tipo Hito</a>
                </li>
              @endcan

              @can('view',new \App\User)
                <li>
                  <a href="{{ route('user.index') }}" class="dropdown-item">Usuarios</a>
                </li>
              @endcan

              @can('view',new \App\User)
                <li>
                  <a href="{{ route('user.index') }}" class="dropdown-item">Roles</a>
                </li>
              @endcan

              @can('view',new \App\User)
                <li>
                  <a href="{{ route('user.index') }}" class="dropdown-item">Permisos</a></li>
              @endcan

            </ul>
          </li>
          
          @can('view',new \App\Producto)
            <li class="nav-item">
              <a href="{{ route('productos') }}" class="nav-link">Productos</a>
            </li>
          @endcan

          <li class="nav-item">
            <a href="/contacto" class="nav-link">Contacto</a>
          </li>
          @endguest
        </ul>

        <!-- SEARCH FORM -->
        <!-- <form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form> -->
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        
        @if(auth()->user())
        <!-- legacy-user-menu.html -->
        <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="/adminlte/dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

            <p>
              {{auth()->user()->name}} - {{auth()->user()->roles->first()->name}}
              <small>Desde {{auth()->user()->created_at->format('d/M/Y')}}</small>
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <form method="POST" action="{{route('logout')}}">
              {{csrf_field()}}
            <button class="btn btn-default btn-block btn-flat float-right">Cerrar sesión</button>
            </form>
          </li>
        </ul>
      </li>
      @else
      <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link">Autenticar</a>
      </li>
      <li class="nav-item">
            <a href="{{ route('register') }}" class="nav-link">Registrar</a>
      </li>
      @endif
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  
  @yield('content')
  
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right 
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
     Default to the left -->
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">Tesis</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

@stack('scripts')

<!-- AdminLTE App -->
<script src="/adminlte/dist/js/adminlte.min.js"></script>

</body>
</html>
