<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ env('APP_NAME') }} - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">
        <a href="{{ url('/') }}" class="logo">
          <span class="logo-mini"><b>L</b>A</span>
          <span class="logo-lg"><b>Lar</b>admin</span>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!--<img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
                  <span class="fa fa fa-user"></span>
                  <span class="hidden-xs">{{ Auth::user()->display_name }}</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <!--<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
                    <i class="fa fa-user fa-5x" style="color:#fff;"></i>
                    <p>
                      {{ Auth::user()->display_name }}
                      <br>
                      {{ Auth::user()->hasrole('admin') ? 'Administrador' : 'Usuario' }}
                      <small>Miembro desde {{ Auth::user()->created_at->format('d-m-Y') }}</small>
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="{{ url('user', [Auth::user()->encode_id]) }}" class="btn btn-default btn-flat">
                        <i class="fa fa-eye"></i> Datos
                      </a>
                    </div>
                    @can('view_logins')
                    <div class="pull-left">
                      <a href="{{ url('logins', [Auth::user()->encode_id]) }}" class="btn btn-default btn-flat">
                        <i class="fa fa-sign-in"></i> Logins
                      </a>
                    </div>
                    @endcan
                    <div class="pull-right">
                      <a href="logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">
                        <i class="fa fa-sign-out"></i> Salir
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <!-- Uncomment this line to activate the control right sidebar button
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
              -->
            </ul>
          </div>
        </nav>
      </header>

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        @include('layouts.partials.leftmenu')
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            @yield('page_title')
            <small>@yield('page_subtitle')</small>
          </h1>
          <ol class="breadcrumb">
            @section('breadcrumb')
            @show
          </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
          <!--Page Content Here -->
          @yield('content')
        </section>
      </div>

      <!-- confirm modal -->
      @include('layouts.partials.confirm_modal')

      <!-- Main Footer -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          {{ env('APP_NAME') }}
        </div>
        <strong>Copyright &copy; 2016 <a href="#">{{ env('APP_NAME') }}</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <!-- Uncomment this line to activate the control right sidebar menu
      @@include('layouts.partials.sidebar')
      -->
    </div>

    <!-- REQUIRED JS SCRIPTS -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
  </body>
</html>
