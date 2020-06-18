<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

     <!-- plugin del select -->


     <link href="{{ asset('/css/estilos_globales.css') }}" rel="stylesheet">
     <link href="{{ asset('/css/bootstrap_combofilter.css') }}" rel="stylesheet">
     <!-- <link href="{{ asset('/css/chosen.css') }}" rel="stylesheet"> -->

  </head>

  <body class="nav-md footer_fixed">
    <div class="container body">
      <div class="main_container" style="display: grid !important;">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/home" class="site_title"><i class="fa fa-truck"></i> <span>GADM CHONE</span></a>
            </div>
             <div class="profile clearfix text-center col-sm-12" align="center">
              <div class="profile_info " style="margin-left:20px;" >
                 <p>BIENVENIDO {{ Auth::user()->name }} </p>
               {{--   @if(Auth::user()->tipo=='A')(administrador)  @else (funcionario) @endif</p> --}}
              </div>
            </div>
            <div class="clearfix"></div>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                 @if(Auth::user()->tipo=='F')
                  <li><a><i class="fa fa-truck"></i>Gestión de Desechos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('/ruta')}}">Rutas</a></li>
                      <li><a href="{{url('/vehiculo')}}">Vehículos</a></li>
                      <li><a href="{{url('/chofer')}}">Choferes</a></li>
                      <li><a href="{{url('/actividad_diaria')}}">Actividad Diaria</a></li>
                    </ul>
                  </li>
                  @endif
                   @if(Auth::user()->tipo=='A')
                  <li><a><i class="fa fa-truck"></i>Gestión de Desechos<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{url('/ruta')}}">Rutas</a></li>
                      <li><a href="{{url('/vehiculo')}}">Vehículos</a></li>
                      <li><a href="{{url('/chofer')}}">Choferes</a></li>
                      <li><a href="{{url('/actividad_diaria')}}">Actividad Diaria</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Administración <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="bandejaOpiniones">Bandeja de opiniones</a></li>
                      <li><a href="EvaluacionServicios">Evaluación de servicios</a></li>
                      <li><a href="reportes">Reportes</a></li>
                    </ul>
                  </li>
                  @endif
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu" style="margin-bottom:0;">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset('images/user.png')}}" alt="">{{ Auth::user()->name }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li>
                        <a  href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out pull-right"></i>Cerrar Sesión
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                  </ul>
                </li>

              </ul>
            </nav>
          </div>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="x_content">
               <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
                @yield('content1')
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <!-- <footer>
          <div class="pull-right">
            Cazz - soft Admin  by <a href="https://colorlib.com">Gamd</a>
          </div>
          <div class="clearfix"></div>
        </footer> -->
        <!-- /footer content -->
      </div>
    </div>



    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <script src="../vendors/nprogress/nprogress.js"></script>
    <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <script src="../build/js/custom.min.js"></script>

    <script src="../vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

    {{--
1
    <!-- jQuery -->
    <!-- Bootstrap -->
    <!-- FastClick -->
    <!-- NProgress -->
    <!-- jQuery Smart Wizard -->
    <!-- Custom Theme Scripts -->
    <!-- jQuery custom content scroller -->

    <!-- Custom Theme Scripts -->



 --}}
 <!-- <script src="../build/js/custom.min.js"></script> -->

 <script src="{{ asset('/js/chosen.jquery.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.chosen-select').chosen();
            $('.chosen-select-deselect').chosen({allow_single_deselect: true});
       });
    </script>

  </body>
</html>