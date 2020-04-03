<!-- PREGUNTA -->
<form id="frm_evaluacion" method="POST" action="{{url('evaluacion')}}"  enctype="multipart/form-data"  class="form-horizontal form-label-left">
    {{csrf_field() }}
    <input id="method_evaluacion" type="hidden" name="_method" value="POST">

<!-- MENSAJES PARA CONFIRMACIÓN DE REGISTROS Y ERRORES -->
    @if(session()->has('mensajeInfoEvaluacion'))
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre_menu"></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="alert alert-{{session('estado')}} alert-dismissible fade in" role="alert" style="margin-bottom: 0;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Información: </strong> {{session('mensajeInfoEvaluacion')}}
                </div>
            </div>
        </div>
    @endif

<!-- FORMULARIO PARA EL REGISTRO -->
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Nombre de la Evaluación: <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" placeholder="Ingrese el nombre de la Evaluación"  id="nombre" name="nombre" required="required" class="form-control col-md-7 col-xs-12">
        </div>
    </div>
    <!-- FECHAS -->
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Fecha Inicio: <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="date"   id="fecha_inicio" name="fecha_inicio" required="required" class="form-control col-md-7 col-xs-12">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Fecha Fin: <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="date" id="fecha_fin" name="fecha_fin" required="required" class="form-control col-md-7 col-xs-12">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Objetivo: <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" placeholder="Ingrese el objetivo de la Evaluación"  id="objetivo" name="objetivo" required="required" class="form-control col-md-7 col-xs-12">
        </div>
    </div>


    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-success">Guardar</button>
            <button type="button" id="btn_evaluacionCancelar" class="btn btn-warning hidden">Cancelar</button>
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
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 259px;">Nombre de la Evaluación</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 259px;">Fecha de Inicio</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 259px;">Fecha Fin</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 259px;">Objetivo</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 117px;">Estado</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 250px;">Acciones</th>
                    </tr>
                </thead>


                <tbody>

                @if(isset($listaEvaluacion))
                    @foreach($listaEvaluacion as $item)
                        <tr role="row" class="odd">
                            <td >{{$item->nombre}}</td>
                            <td >{{$item->fecha_inicio}}</td>
                            <td >{{$item->fecha_fin}}</td>
                            <td >{{$item->objetivo}}</td>
                            <td @if($item->estado=='E')class="bg-success"@else class="bg-danger" @endif >{{$item->estado}}</td>
                            <td class="paddingTR">
                                <center>
                                <form method="POST" class="frm_eliminar" action="{{url('evaluacion/'.encrypt($item->idevaluacion))}}"  enctype="multipart/form-data">
                                    {{csrf_field() }} <input type="hidden" name="_method" value="DELETE">
                                    <button type="button" onclick="evaluacion_editar('{{encrypt($item->idevaluacion)}}')" class="btn btn-sm btn-primary marginB0"><i class="fa fa-edit"></i> Editar</button>
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

