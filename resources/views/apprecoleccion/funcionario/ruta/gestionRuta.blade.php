@extends('apprecoleccion.home_recoleccion')
@section('content1')
<!-- REGISTRO DE LAS RUTAS -->
<!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!-- <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">

    <div class="row">
        <div class="col-md-12">
            <h2><center>SUB-DIRECCIÓN DE GESTIÓN DE DESECHOS</center></h2>
            <br>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="" id="RegistroRutas">
        <div class="x_panel">
            <div class="x_title">
                <h2><i class="fa fa-check"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">RUTAS DE RECOLECCIÓN DE DESECHOS</font></font></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li style="float: right;"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content x_content_border_mobil">

                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs ul_mobil" role="tablist">
                        <li role="presentation" class="@if(session()->has('mensajePInfoRuta')) active @endif ">
                            <a href="#ruta" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">
                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fa fa-save"></i> Crear Ruta</font></font>
                            </a>
                        </li>
                        <li role="presentation" class="@if(session()->has('mensajePInfoPuntoRuta')) active @endif " >
                            <a href="#puntoRuta" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false" ><i class="fa fa-code-fork" ></i> Establecer Ruta en el mapa</font></font>
                            </a>
                        </li>
                        <li role="presentation" class="" >
                            <a href="#dibujoRuta" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">
                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fa fa-eye"></i> Ver Ruta en el mapa</font></font>
                            </a>
                        </li>
                    </ul>
                </div>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade @if(session()->has('mensajePInfoRuta')) active in @endif" id="ruta" aria-labelledby="home-tab">
                        @include('apprecoleccion.funcionario.ruta.rutas')
                    </div>
                    <div role="tabpanel" class="tab-pane fade @if(session()->has('mensajePInfoPuntoRuta')) active in @endif" id="puntoRuta" aria-labelledby="profile-tab">
                        @include('apprecoleccion.funcionario.ruta.puntoRuta')
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="dibujoRuta" aria-labelledby="profile-tab">
                        @include('apprecoleccion.funcionario.ruta.dibujoRuta')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script> -->
    <script src="{{asset('/js/GestionRutas.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAg3Y75nW9Y4wNgeUEQBz8ckD4gPJEGtiY&callback=initMaps" libraries=drawingasync defer></script>
@endsection