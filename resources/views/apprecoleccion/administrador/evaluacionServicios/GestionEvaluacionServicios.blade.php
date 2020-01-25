@extends('apprecoleccion.home_recoleccion')

@section('content1')
<!-- Datatables -->
<link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
   
<link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">

<div class="" id="RegistroEvaluacionServicios">
        <div class="x_panel">
            <div class="x_title">
                <h2><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><h4><b>GESTIÓN DE LA EVALUACIÓN DE SERVICIOS</b></h4></font></font></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li style="float: right;"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content x_content_border_mobil">

                <div class="" role="tabpanel" data-example-id="togglable-tabs">

                    <ul id="myTab" class="nav nav-tabs bar_tabs ul_mobil" role="tablist">
                        <li role="presentation" class="@if(session()->has('mensajePInfoEvaluacion')) active @endif ">
                            <a href="#evaluacion" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">
                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Crear Evaluación</font></font>
                            </a>
                        </li>
                        <li role="presentation" class="@if(session()->has('mensajePInfoPregunta')) active @endif ">
                            <a href="#pregunta" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">
                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Crear Pregunta</font></font>
                            </a>
                        </li>
                        <li role="presentation" class="@if(session()->has('mensajePInfoPreguntaEvaluacion')) active @endif ">
                            <a href="#pregunta_evaluacion" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">
                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Asignar Pregunta - Evaluación</font></font>
                            </a>
                        </li>  
    
                    </ul>

                </div>

                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade @if(session()->has('mensajePInfoPregunta')) active in @endif" id="pregunta" aria-labelledby="home-tab">
                    @include('apprecoleccion.administrador.evaluacionServicios.pregunta')
                    </div>
                    <div role="tabpanel" class="tab-pane fade @if(session()->has('mensajeInfoEvaluacion')) active in @endif" id="evaluacion" aria-labelledby="profile-tab">
                    @include('apprecoleccion.administrador.evaluacionServicios.evaluacion')
                    </div>
                    <div role="tabpanel" class="tab-pane fade @if(session()->has('mensajePInfoPreguntaEvaluacion')) active in @endif" id="pregunta_evaluacion" aria-labelledby="profile-tab">
                    @include('apprecoleccion.administrador.evaluacionServicios.pregunta_evaluacion')
                    </div>
            
                </div>

            </div>
        </div>
    
    </div>
<script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="{{asset('/js/GestionEvaluacionServicios.js')}}"></script>

@endsection