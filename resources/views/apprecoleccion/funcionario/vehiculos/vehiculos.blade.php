<!-- REGISTRO DE VEHICULOS -->
<form id="frm_vehiculos" method="POST" action="{{url('vehiculo')}}"  enctype="multipart/form-data"  class="form-horizontal form-label-left">
    {{csrf_field() }}
    <input id="method_vehiculos" type="hidden" name="_method" value="POST">
    <div class="x_title">
    <h2><b><center>SUB-DIRECCIÓN DE GESTIÓN DE DESECHOS</center></b></h2> 
     
      <div class="clearfix"></div>
    </div>
<!-- MENSAJES PARA CONFIRMACIÓN DE REGISTROS Y ERRORES -->
    @if(session()->has('mensajeInfoVehiculo'))
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre_menu"></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="alert alert-{{session('estado')}} alert-dismissible fade in" role="alert" style="margin-bottom: 0;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Información: </strong> {{session('mensajeInfoVehiculo')}}
                </div>
            </div>
        </div>
    @endif
<!-- FORMULARIO PARA EL REGISTRO -->
        <br>
        <center><h4><b>VEHÍCULOS DE LA RECOLECCIÓN DE DESECHOS</b></h4></center>
        <br>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Código del Vehículo:<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="numero" required="required" name="numero" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Placa: <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" id="placa" required="required" name="placa" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Tipo de vehículo:<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="">
                    <select placeholder="Seleccione un Tipo de vehículo"  name="tipo_vehiculo" id="tipo_vehiculo" required="required" class=" form-control" tabindex="5">
                        <option disabled selected>Seleccione un Tipo de vehículo...</option>
                        <option value="recolector">recolector</option>
                        <option value="volquete">volquete</option>
                    </select>
                </div>
            </div>
          </div>



    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-success">Guardar</button>
            <button type="button" id="btn_vehiculoCancelar" class="btn btn-warning hidden">Cancelar</button>
        </div>
    </div>
    <div class="ln_solid"></div>

</form>
<!-- tabla de los datos -->
<div class="table-responsive">
    <div class="row">
        <div class="col-sm-12">
            <table id="datatable-checkbox" class="table table-striped table-bordered">
            
                <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 259px;">Código del vehículo</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 259px;">Placa</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 117px;">Tipo de vehículo</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 117px;">Acciones</th>
                </tr>
                </thead>


                <tbody>
                @if(isset($listaVehiculos))
                    @foreach($listaVehiculos as $item)
                    <tr role="row" class="odd">
                        <td class="sorting_1">{{$item->numero}}</td>
                        <td >{{$item->placa}}</td>
                        <td >{{$item->tipo_vehiculo}}</td>
                        <td   class="paddingTR">
                            <center>
                            <form method="POST" class="frm_eliminar" action="{{url('vehiculo/'.encrypt($item->idrecolector))}}"  enctype="multipart/form-data">
                                {{csrf_field() }} <input type="hidden" name="_method" value="DELETE">
                                <button type="button" onclick="vehiculo_editar('{{encrypt($item->idrecolector)}}')" class="btn btn-sm btn-primary marginB0"><i class="fa fa-edit"></i> Editar</button>
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
