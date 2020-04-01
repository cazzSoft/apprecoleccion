<div class=""  >
    <div class="row " id="divMapa2">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel ">
                <div class="x_title ">
                    <h4><center>GRÁFICAS DE LAS RUTAS DE RECOLECCIÓN DE DESECHOS REGISTRADAS</center></h4>
                    <div id="alerta2">
                    </div>
                </div>
                <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <section class="panel">
                            <div class="panel-body">
                                <div class="project_detail">
                                    <div class="form-group">
                                    <h4>Rutas registradas</h4>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="chosen-select-content">
                                                <select   data-placeholder="Seleccione una ruta..." name="Seleccionar_ruta1" id="Seleccionar_ruta1" onchange="ShowSelected1()" required="required" class="chosen-select form-control" tabindex="5" >
                                                    <option value=""></option>
                                                        @if(isset($listaRutas))
                                                            @foreach($listaRutas as $n)
                                                                @if($n->estado_grafica=='SI')
                                                                    <optgroup label="{{$n->nombre_ruta}}">
                                                                        <option class="opcion_sectores1"  value="{{$n->idruta}}" >{{$n->descripcion}}
                                                                        </option>
                                                                    </optgroup>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="message_wrapper" id="txtDetalleRuta">
                                                <blockquote class="message" id="sectores1">Ninguna ruta seleccionada</blockquote>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <form id="frm_Grafica" method="PUT"  enctype="multipart/form-data"  class="form-horizontal form-label-left">
                                                    @csrf
                                                      <button class="btn btn-danger btn-block" type="submit" > <i class="fa fa-close" > </i>  Eliminar gráfica   </button>
                                                 </form>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div id="map2" style="height:600px; width:100%" >

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('/js/rutaDibujoMapa.js')}}"></script>


