<form id="frm_ActDiaria" method="POST" action="{{url('actividad_diaria')}}"  enctype="multipart/form-data"  class="form-horizontal form-label-left">
    {{csrf_field() }}
    <input id="method_ActDiaria" type="hidden" name="_method" value="POST">


    <div class="x_title">
    <h2><b><center>SUB-DIRECCIÓN DE GESTIÓN DE DESECHOS</center></b></h2>


      <div class="clearfix"></div>
    </div>
    <!-- MENSAJES PARA CONFIRMACIÓN DE REGISTROS Y ERRORES -->
    @if(session()->has('mensajeInfoAcDiaria'))
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre_menu"></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="alert alert-{{session('estado')}} alert-dismissible fade in" role="alert" style="margin-bottom: 0;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Información: </strong> {{session('mensajeInfoAcDiaria')}}
                </div>
            </div>
        </div>
    @endif
<!-- FORMULARIO DE REGISTRO -->


        <br>
        <center><h4><b>ACTIVIDAD DIARIA DE LOS RECOLECTORES DE DESECHOS</b></h4></center>
        <br>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Escoja la Ruta:<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="chosen-select-content">
                    <select   name="ruta" id="Seleccionar_ruta"  required="required" class="chosen-select form-control" tabindex="5">
                        <option disabled selected>Seleccione una Ruta...</option>
                            @if(isset($listaRutas))
                                @foreach($listaRutas as $ruta)
                                <optgroup label="{{$ruta->nombre_ruta}}">
                                    <option class="Seleccionar_ruta" value="{{$ruta->idruta}}">{{$ruta->descripcion}}</option>
                                </optgroup>
                                @endforeach
                            @endif
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="dia">Días de la Semana:<span class="required">*</span><br /> (Permitido la selección múltiple)
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12" >
              <div class="checkbox" style="display:inline-block;">
                <label>
                  <input type="checkbox" id="lunes" name="dia[]" value="Lunes"> Lunes
                </label>
              </div>
              <div class="checkbox" style="display:inline-block;">
                <label>
                  <input type="checkbox" id="martes" name="dia[]" value="Martes"> Martes
                </label>
              </div>
              <div class="checkbox" style="display:inline-block;">
                <label>
                  <input type="checkbox" id="miercoles" name="dia[]" value="Miércoles"> Miércoles
                </label>
              </div>
              <div class="checkbox" style="display:inline-block;">
                <label>
                  <input type="checkbox" id="jueves" name="dia[]" value="Jueves">Jueves
                </label>
              </div>
              <div class="checkbox" style="display:inline-block;">
                <label>
                  <input type="checkbox" id="viernes" name="dia[]" value="viernes">Viernes
                </label>
              </div>
              <div class="checkbox" style="display:inline-block;">
                <label>
                  <input type="checkbox" id="sabado" name="dia[]" value="Sábado">Sábado
                </label>
              </div>
              <div class="checkbox"  style="display:inline-block;">
                <label>
                  <input type="checkbox" id="domingo"  name="dia[]" value="Domingo">Domingo
                </label>
              </div>

            </div>

        </div>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="control-label col-md-3 col-sm-3 col-xs-12">Horario:*</label>
                <label for="name" class="control-label col-md-1 col-sm-1 col-xs-6">Inicio:<span class="required"></span></label>
                <input  type="time" class="col-md-1 " id="hora_inicio" name="hora_inicio"  required autofocus>
                <label for="name" class="control-label col-md-1 col-sm-1 col-xs-6">Fin:<span class="required"></span></label>
                <input  type="time" class="col-md-1" id="hora_fin" name="hora_fin"  required autofocus>
            </div>
<!--
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                <label for="name" class="control-label col-md-3 col-sm-3 col-xs-12">Hora Fin:<span class="required">*</span></label>


            </div>
 -->

        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Recolector:<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="chosen-select-content">
                    <select   name="vehiculo" id="Seleccionar_recolector"  required="required" class="chosen-select form-control" tabindex="5">
                        <option disabled selected>Seleccione un Recolector...</option>
                            @if(isset($listaRecolectores))
                                @foreach($listaRecolectores as $recolector)

                                    <option class="Seleccionar_recolector" value="{{$recolector->idrecolector}}">{{$recolector->numero}}</option>

                                @endforeach
                            @endif
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="persona">Chofer:<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="chosen-select-content">
                    <select   name="chofer" id="Seleccionar_chofer"  required="required" class="chosen-select form-control" tabindex="5">
                        <option disabled selected>Seleccione un Chofer...</option>
                            @if(isset($listaChoferes))
                                @foreach($listaChoferes as $chofer)
                                    <option  class="Seleccionar_chofer" value="{{$chofer->idpersona}}">{{$chofer->nombres}}</option>
                                @endforeach
                            @endif
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group">
          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" class="btn btn-success">Guardar</button>
              <button type="button" id="btn_ActDiariaCancelar" class="btn btn-warning hidden">Cancelar</button>
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
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Ruta</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Días de la Semana</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Horario</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Recolector</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" >Chofer</th>
                    <th class="sorting" tabindex="0" width="250px" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Acciones</th>
                </tr>
                </thead>

                <tbody>
                @if(isset($listaActividadDiaria))
                    @foreach($listaActividadDiaria as $item)
                    <tr role="row" class="odd">
                        <td class="sorting_1">{{$item->ruta->nombre_ruta}} -> {{$item->ruta->descripcion}}</td></td>
                        <td >{{$item->dia}}</td>
                        <td >{{$item->hora_inicio}} -- {{$item->hora_fin}}</td>
                        <td >{{$item->recolector->numero}}</td>
                        <td >{{$item->chofer->nombres}}</td>
                        <td   class="paddingTR">
                            <center>
                            <form method="POST" class="frm_eliminar" action="{{url('actividad_diaria/'.encrypt($item->idactividad_diaria))}}"  enctype="multipart/form-data">
                                {{csrf_field() }} <input type="hidden" name="_method" value="DELETE">
                                <button type="button" onclick="actDiaria_editar('{{encrypt($item->idactividad_diaria)}}')" class="btn btn-sm btn-primary marginB0"><i class="fa fa-edit"></i> Editar</button>
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
<br>
<br>
<br>

