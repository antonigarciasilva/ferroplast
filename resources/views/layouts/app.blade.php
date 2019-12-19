<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div id="main-wrapper">
            <header class="topbar" data-navbarbg="skin5">
              <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                  <a
                    class="nav-toggler waves-effect waves-light d-block d-md-none"
                    href="javascript:void(0)"
                  >
                    <i class="ti-menu ti-close"></i>
                  </a>
                  <a class="navbar-brand" href="/home">
                    <!--
                    <b class="logo-icon p-l-10">
                      <img style="width: 180px" src="images/ferro.jpg" alt="homepage" class="light-logo" />
                    </b>
                  -->
                    <span class="logo-text pl-4">
                      <img style="width: 180px" src="images/ferro.jpg" alt="homepage" class="light-logo" />
                    </span>
                  </a>
                  <a
                    class="topbartoggler d-block d-md-none waves-effect waves-light"
                    href="javascript:void(0)"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                  >
                    <i class="ti-more"></i>
                  </a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                  <ul class="navbar-nav float-left mr-auto">
                    <li class="nav-item d-none d-md-block">
                      <a
                        class="nav-link sidebartoggler waves-effect waves-light"
                        href="javascript:void(0)"
                        data-sidebartype="mini-sidebar"
                      >
                        <i class="mdi mdi-menu font-24"></i>
                      </a>
                    </li>
                  </ul>
                  <ul class="navbar-nav float-right">
                    <li class="nav-item dropdown">
                      <a
                        class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic"
                        href
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                      >
                        <img src="images/user.png" alt="user" class="rounded-circle" width="31" />
                      </a>
                          <div class="dropdown-menu dropdown-menu-right user-dd animated">
                            <a class="dropdown-item" 
                              href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                              <i class="fa fa-power-off m-r-5 m-l-5"></i> {{ __('Logout') }}
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                              </form>
                            </a>
                          </div>
                    </li>
                  </ul>
                </div>
              </nav>
            </header>
            <aside class="left-sidebar" data-sidebarbg="skin5">
              <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                  <ul id="sidebarnav" class="p-t-30">
                    <li class="sidebar-item">
                      <a
                        href="/home"
                        class="sidebar-link waves-effect waves-dark sidebar-link"
                        aria-expanded="false"
                      >
                        <i class="mdi mdi-chart-bar"></i>
                        <span class="hide-menu">Panel de control</span>
                      </a>
                    </li>
                    <li class="sidebar-item">
                      <a
                        href="empleados"
                        class="sidebar-link waves-effect waves-dark sidebar-link"
                        aria-expanded="false"
                      >
                        <i class="mdi mdi-account"></i>
                        <span class="hide-menu">Empleados</span>
                      </a>
                    </li>
                    <li class="sidebar-item">
                      <a
                        href="cargos"
                        class="sidebar-link waves-effect waves-dark sidebar-link"
                        aria-expanded="false"
                      >
                        <i class="mdi mdi-briefcase"></i>
                        <span class="hide-menu">Cargo</span>
                      </a>
                    </li>
                    
                    <li class="sidebar-item">
                      <a
                        href="pagos"
                        class="sidebar-link waves-effect waves-dark sidebar-link"
                        aria-expanded="false"
                      >
                        <i class="mdi mdi-cash"></i>
                        <span class="hide-menu">Pagos</span>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
            </aside>
            <div class="page-wrapper">
              <div class="page-breadcrumb">
                <div class="row">
                  <div class="col-12 d-flex no-block align-items-center">
                    <div class="ml-auto text-right">
                      <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item">
                            <a href="/home">Dashboard</a>
                          </li>
                          <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                        </ol>
                      </nav>
                    </div>
                  </div>
                </div>
              </div>
              <main class="container-fluid">
                @yield('content')
              </main>
              <footer class="footer text-center">Copyright 2019 &copy; Antoni García</footer>
            </div>
          </div>
    </div>
</body>
</html>
