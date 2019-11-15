<!-- REGISTRO DE RUTAS -->
<form id="frm_rutas" method="POST" action="{{url('ruta')}}"  enctype="multipart/form-data"  class="form-horizontal form-label-left">
    {{csrf_field() }}
    <input id="method_rutas" type="hidden" name="_method" value="POST">

<!-- MENSAJES PARA CONFIRMACIÓN DE REGISTROS Y ERRORES -->
    @if(session()->has('mensajePInfoRuta'))
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre_menu"></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="alert alert-{{session('estadoP')}} alert-dismissible fade in" role="alert" style="margin-bottom: 0;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Información: </strong> {{session('mensajePInfoRuta')}}
                </div>
            </div>
        </div>
    @endif
<!-- FORMULARIO PARA EL REGISTRO -->
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Nombre de la ruta:<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="nombre_ruta" required="required" class="form-control col-md-7 col-xs-12" name="nombre_ruta" placeholder="Escriba el nombre de la ruta">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Sectores: <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
            <textarea type="text" id="descripcion" class="form-control col-md-7 col-xs-12" name="descripcion"  required autofocus required rows="3" placeholder="Escriba aqu&iacute;..."></textarea> 
            </div>
          </div>

    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-success">Guardar</button>
            <button type="button" id="btn_rutaCancelar" class="btn btn-warning hidden">Cancelar</button>
        </div>
    </div>
    <div class="ln_solid"></div>

</form>
<!-- tabla de los datos -->
<div class="table-responsive">
    <div class="row">
        <div class="col-sm-12">
            <table id="datatable-buttons" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Nombre de la ruta</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Sectores</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($listaRutas))
                    @foreach($listaRutas as $item)
                        <tr role="row" class="odd">
                            <td class="sorting_1">{{$item->nombre_ruta}}</td>
                            <td >{{$item->descripcion}}</td>
                            <td   class="paddingTR">
                                <center>
                                <form method="POST" class="frm_eliminar" action="{{url('ruta/'.encrypt($item->idruta))}}"  enctype="multipart/form-data">
                                    {{csrf_field() }} <input type="hidden" name="_method" value="DELETE">
                                    <button type="button" onclick="ruta_editar('{{encrypt($item->idruta)}}')"  class="btn btn-sm btn-primary marginB0"><i class="fa fa-edit"></i> Editar</button>
                                    <button type="button" class="btn btn-sm btn-danger marginB0" onclick="btn_eliminar(this)"><i class="fa fa-trash"></i> Eliminar</button>
                                </form>
                                </center>
                            </td>
                        </tr>
                    @endforeach
                @endif 
                </tbody>
            </table>
        </div>
    </div>
</div>

