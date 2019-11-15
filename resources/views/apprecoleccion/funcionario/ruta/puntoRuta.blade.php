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
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-6" for="">Escoga la Ruta:<span class="required"></span>
            </label>
            <div class="col-md-12 col-sm-12 col-xs-6">
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
 <!-- DATOS DE LA RUTA -->  
    <div class="flip-card" style="border:8px groove lightgrey;" >
        <b><h5 style="color:#333"><center> DATOS SELECCIONADOS </center></h5></b>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color:#333">RUTA: </label>
            <label class="control-label col-md-8 col-sm-4 col-xs-12" id="nombre_ruta"> </label>
        </div>  
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color:#333" ><span>SECTORES:</span></label>
            
            <label class="control-label col-md-8 col-sm-4 col-xs-12" id="sectores"></label>
        </div>
    </div>   
    </div>   
    <div class="col-md-6">
        <!-- DIBUJAR RUTA -->
        <div class="form-group col-md-3">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63832.20305791997!2d-80.13618288494797!3d-0.709187841425866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x902b076535aa8203%3A0xf88baf19ad7f8733!2sChone!5e0!3m2!1ses!2sec!4v1570597689521!5m2!1ses!2sec" width="400" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </div>   
    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-5">
            <button type="submit" class="btn btn-success">Guardar</button>
            <button type="button" id="btn_puntoRutaCancelar" class="btn btn-warning hidden">Cancelar</button>
        </div>
    </div>
    <div class="ln_solid"></div>
    </div>
</div>
</form>
<!-- TABLA DE LOS DATOS -->
<div class="table-responsive">
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
</div>