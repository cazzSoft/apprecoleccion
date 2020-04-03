<!-- Vista Para la ASIGNACIÓN DE CERTIFICADO CON SUS REQUISITOS -->
<form id="frm_PreguntaEvaluacion" method="POST" action="{{url('pregunta_evaluacion')}}"  enctype="multipart/form-data" class="form-horizontal form-label-left">
    {{csrf_field() }}
    <input id="method_PreguntaEvaluacion" type="hidden" name="_method" value="POST">
<!-- MENSAJES PARA CONFIRMACIÓN DE REGISTROS Y ERRORES -->
    @if(session()->has('mensajePInfoPreguntaEvaluacion'))
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre_menu"></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="alert alert-{{session('estado')}} alert-dismissible fade in" role="alert" style="margin-bottom: 0;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Información: </strong> {{session('mensajePInfoPreguntaEvaluacion')}}
                </div>
            </div>
        </div>
    @endif
<!-- FORMULARIO PARA EL REGISTRO -->
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Pregunta<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="chosen-select-content">
                <select data-placeholder="Seleccione una Pregunta" name="pregunta" id="Seleccionar_pregunta"  class="chosen-select form-control" tabindex="5">
                <option value=""></option>
                    @if(isset($listaPreguntas))
                        @foreach($listaPreguntas as $item)
                            <option class="opcion_pregunta" value="{{$item->idpregunta}}">{{$item->descripcion}} </option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">Evaluación<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="chosen-select-content">
                <select data-placeholder="Seleccione una Evaluación" name="evaluacion" id="Seleccionar_evaluacion"  class="chosen-select form-control" tabindex="5">
                <option value=""></option>
                @if(isset($listaEvaluacion))
                    @foreach($listaEvaluacion as $evaluacion)
                    @if($evaluacion->estado=='E')
                        <optgroup label="Inicio: {{$evaluacion->fecha_inicio}} ---- Fin: {{$evaluacion->fecha_fin}}">
                            <option class="opcion_evaluacion" value="{{$evaluacion->idevaluacion}}">{{$evaluacion->nombre}}</option>
                        <optgroup>
                    @endif
                    @endforeach
                @endif
                </select>
            </div>
        </div>
    </div>


    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-success">Guardar</button>
            <button type="button" id="btn_PreguntaEvaluacionCancelar" class="btn btn-warning hidden">Cancelar</button>
        </div>
    </div>
</form>

<div class="ln_solid"></div>
<!-- tabla de los datos INGRESADOS -->
<div class="table-responsive">
    <div class="row">
        <div class="col-sm-12">
            <table id="datatable-fixed-header" class="table table-striped table-bordered">
                <thead>
                <tr role="row">
                    <th class="sorting_desc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" aria-sort="descending" style="width: 157px;">Evaluación</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 259px;">Pregunta</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 200;">Acciones</th>
                </tr>
                </thead>

                <tbody>
                @if(isset($listaPreguntaEvaluacion))
                        @foreach($listaPreguntaEvaluacion as $item)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{$item->evaluacion->nombre}}</td>
                                <td >{{$item->pregunta->descripcion}}</td>

                                <td   class="paddingTR">
                                    <center>
                                    <form method="POST" class="frm_eliminar" action="{{url('pregunta_evaluacion/'.encrypt($item->idpregunta_evaluacion))}}"  enctype="multipart/form-data">
                                        {{csrf_field() }} <input type="hidden" name="_method" value="DELETE">
                                        <button type="button" onclick="PreguntaEvaluacion_editar('{{encrypt($item->idpregunta_evaluacion)}}')" class="btn btn-sm btn-primary marginB0"><i class="fa fa-edit"></i> Editar</button>
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