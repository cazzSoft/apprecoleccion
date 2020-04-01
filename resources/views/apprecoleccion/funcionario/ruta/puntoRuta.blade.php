 <!-- FORMULARIO PARA EL REGISTRO -->
<div id="tabs">
 <div class="" id="divMapa1">
    <form id="frm_PuntoRuta" method="POST"   enctype="multipart/form-data"  class="form-horizontal form-label-left ">
        @csrf
        <input id="method_PuntoRuta" type="hidden" name="_method" value="POST">
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel ">
                    <div class="x_title ">
                        <h4><center>MAPA DE LAS RUTAS DE RECOLECCIÓN DE DESECHOS</center></h4>
                        <div id="alerta1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                             Para realizar el registro de la ruta en el mapa, primero deberá seleccionar la ruta y posteriormente graficarla.
                        </div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <section class="panel">
                                <div class="panel-body">
                                    <div class="project_detail">
                                        <div class="form-group" id="recargar">
                                        <h4>Rutas registradas</h4>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="chosen-select-content">
                                                    <select  data-placeholder="Seleccione una ruta..." name="Seleccionar_ruta" id="Seleccionar_ruta" onchange="ShowSelected()" required="required" class="chosen-select form-control" tabindex="5">
                                                        <option value=""></option>
                                                            @if(isset($listaRutas))
                                                                @foreach($listaRutas as $n)
                                                                    @if($n->estado_grafica=='NO')
                                                                        <optgroup label="{{$n->nombre_ruta}}">
                                                                            <option class="opcion_sectores" value="{{$n->idruta}}">{{$n->descripcion}}
                                                                            </option>
                                                                        </optgroup>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="message_wrapper">
                                                    <blockquote class="message" id="sectores">Ninguna ruta seleccionada</blockquote>
                                                </div>
                                                <div class="col-md-6">
                                                     <button class="btn btn-success btn-block" id="btn_Guardar"  type="submit" > <i class="fa fa-save" > </i>  Guardar</button>
                                                    <!-- <input type="button" value="Guardar" id="" onclick="guardar()" class="btn btn-primary btn-sm"> -->
                                                </div>
                                                <div class="col-md-6">
                                                    <a class="btn btn-warning btn-block" id ="btn_puntoRutaCancelar" onclick="initMap1()" ><i class="fa fa-remove"> </i>  Cancelar</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a  onclick="eliminarUltimoPunto()" accesskey="z"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                            <div id="map1" style="height:600px; width:100%" >

                            </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
<script src="{{asset('/js/rutaMapa.js')}}"></script>
