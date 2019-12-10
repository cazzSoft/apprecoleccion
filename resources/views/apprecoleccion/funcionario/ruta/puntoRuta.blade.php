<!-- REGISTRO DEL DIBUJO DE RUTAS -->
<form id="frm_PuntoRuta" method="POST" action="{{url('PuntoRuta')}}"  enctype="multipart/form-data"  class="form-horizontal form-label-left">
    {{csrf_field() }}
    <input id="method_PuntoRuta" type="hidden" name="_method" value="POST">

<!-- MENSAJES PARA CONFIRMACIÓN DE REGISTROS Y ERRORES -->
    @if(session()->has('mensajeInfoPuntoRuta'))
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre_menu"></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="alert alert-{{session('estado')}} alert-dismissible fade in" role="alert" style="margin-bottom: 0;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Información: </strong> {{session('mensajeInfoPuntoRuta')}}
                </div>
            </div>
        </div>
    @endif
<!-- FORMULARIO PARA EL REGISTRO -->

    <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Mapa de rutas de recolección de desechos</h2>
                        <div class="clearfix"></div>
                    </div>

                  <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <ul class="stats-overview">
                            <li>
                              <span class="name"> Latitud </span>
                              <span class="value text-success"> 2300 </span>
                            </li>
                            <li>
                              <span class="name"> Longitud </span>
                              <span class="value text-success"> 2000 </span>
                            </li>
                            <li class="hidden-phone">
                              <span class="name"> Estimated project duration </span>
                              <span class="value text-success"> 20 </span>
                            </li>
                        </ul>
                        <br/>
                       <div id="map" style="height:600px; width:950px">
                           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63832.20305791997!2d-80.13618288494797!3d-0.709187841425866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x902b076535aa8203%3A0xf88baf19ad7f8733!2sChone!5e0!3m2!1ses!2sec!4v1570597689521!5m2!1ses!2sec" width="100%" height="350px" frameborder="0" style="border:0;" allowfullscreen=""></iframe> 
                       </div>

                        <div>
                            <h4>Descripcion de la Ruta</h4>
                            <ul class="messages">
                              <li>
                                <div class="message_wrapper">
                                  <h4 class="heading">Sectores</h4>
                                  <blockquote class="message" id="sectores">Ninguna ruta seleccionada</blockquote>
                                  <br />
                                </div>
                              </li>
                            </ul>
                        </div>
                    </div>
     
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <section class="panel">
                            <div class="x_title">
                              <h2>Rutas registradas</h2>
                              <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                               <div class="project_detail">
                                    <div class="form-group">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="chosen-select-content">
                                                <select   data-placeholder="Seleccione una ruta..." name="Seleccionar_ruta" id="Seleccionar_ruta" onchange="ShowSelected()" required="required" class="chosen-select form-control" tabindex="5">
                                                    <option value=""></option>
                                                        @if(isset($listaRutasCMB))
                                                            @foreach($listaRutasCMB as $cr=> $conten_ruta)
                                                                @foreach($conten_ruta as $r=> $ruta)
                                                                    <optgroup label="{{$r}}">
                                                                    @foreach($ruta as $s=> $sector)
                                                                        <option class="opcion_sectores" value="{{$sector->idruta}}">{{$sector->descripcion}}</option>
                                                                    @endforeach
                                                                    </optgroup>
                                                                @endforeach
                                                            @endforeach
                                                        @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                  </div>
                </div>
            </div>
    </div>
    </form> 
    <div class="row">
        <div class="col-sm-12">
                <table id="" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting_desc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" aria-sort="descending">Ruta</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Latitud</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Longitud</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr role="row" class="odd">
                            <td class="sorting_1"></td>
                            <td ></td>
                            <td ></td>
                            <td   class="paddingTR">
                                <center>
                                    <form method="POST" class="frm_eliminar" action=""  enctype="multipart/form-data">
                                        {{csrf_field() }} <input type="hidden" name="_method" value="DELETE">
                                        <button type="button" class="btn btn-sm btn-danger marginB0" onclick="btn_eliminar(this)"><i class="fa fa-trash"></i> Eliminar</button>
                                    </form>
                                </center>
                            </td>
                        </tr>
                    </tbody>
                </table>
        </div>
    </div>
<script>
      var map;
     function initMap() {
  var myLatlng = {lat: -0.698975, lng: -80.093439};

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 12,
    center: myLatlng
  });



  var marker = new google.maps.Marker({
    position: myLatlng,
    map: map,
    title: 'Click to zoom',
    draggable: true,
    animation: google.maps.Animation.DROP
  });


  map.addListener('center_changed', function() {
    // 3 seconds after the center of the map has changed, pan back to the
    // marker.
    window.setTimeout(function() {
      map.panTo(marker.getPosition());
    }, 3000);
  });

  marker.addListener('click', function() {
    map.setZoom(8);
    map.setCenter(marker.getPosition());
  });
}
    </script>

