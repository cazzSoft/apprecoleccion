<!-- REGISTRO DE CHOFERES-->
<form id="frm_choferes" method="POST" action="{{url('chofer')}}"  enctype="multipart/form-data"  class="form-horizontal form-label-left">
    {{csrf_field() }}
    <input id="method_choferes" type="hidden" name="_method" value="POST">
    <div class="x_title">
      <h2>SUB-DIRECCIÓN DE GESTIÓN DE DESECHOS</h2>


      <div class="clearfix"></div>
    </div>
<!-- MENSAJES PARA CONFIRMACIÓN DE REGISTROS Y ERRORES -->
    @if(session()->has('mensajeInfoChofer'))
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for=""></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="alert alert-{{session('estado')}} alert-dismissible fade in" role="alert" style="margin-bottom: 0;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Información: </strong> {{session('mensajeInfoChofer')}}
                </div>
            </div>
        </div>
    @endif
<!-- FORMULARIO PARA EL REGISTRO -->
        <br>
            <center><h4><b>CHOFERES DE LOS VEHÍCULOS ENCARGADOS DE LA RECOLECCIÓN DE DESECHOS</b></h4></center>

        <br>

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Nombres del Chofer:<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="nombres" name="nombres" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Cédula de Identidad: <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="number" max="9999999999" id="dni" name="dni"required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Celular: <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="number" max="999999999"  id="celular" name="celular" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>

    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-success">Guardar</button>
            <button type="button" id="btn_choferCancelar" class="btn btn-warning hidden">Cancelar</button>
        </div>
    </div>
    <div class="ln_solid"></div>

</form>
<!-- tabla de los datos -->
<div class="table-responsive">
    <div class="row">
        <div class="col-sm-12">
            <table id="datatable-checkbox" class="table table-striped table-bordered ">
                <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Nombre del Chófer</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Cédula de Identidad</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Celular</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Acciones</th>
                </tr>
                </thead>

                <tbody>
                @if(isset($listaChoferes))
                    @foreach($listaChoferes as $item)
                    <tr role="row" class="odd">
                        <td class="sorting_1">{{$item->nombres}}</td>
                        <td >{{$item->dni}}</td>
                        <td >{{$item->celular}}</td>
                        <td   class="paddingTR">
                            <center>
                            <form method="POST" class="frm_eliminar" action="{{url('chofer/'.encrypt($item->idpersona))}}"  enctype="multipart/form-data">
                                {{csrf_field() }} <input type="hidden" name="_method" value="DELETE">
                                <button type="button" onclick="chofer_editar('{{encrypt($item->idpersona)}}')" class="btn btn-sm btn-primary marginB0"><i class="fa fa-edit"></i> Editar</button>
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
