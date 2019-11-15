<!-- PREGUNTA -->
<form id="frm_pregunta" method="POST" action="{{url('pregunta')}}"  enctype="multipart/form-data"  class="form-horizontal form-label-left">
    {{csrf_field() }}
    <input id="method_pregunta" type="hidden" name="_method" value="POST">

<!-- MENSAJES PARA CONFIRMACIÓN DE REGISTROS Y ERRORES -->
    @if(session()->has('mensajePInfoPregunta'))
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre_menu"></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="alert alert-{{session('estado')}} alert-dismissible fade in" role="alert" style="margin-bottom: 0;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Información: </strong> {{session('mensajePInfoPregunta')}}
                </div>
            </div>
        </div>
    @endif
<!-- FORMULARIO PARA EL REGISTRO -->
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pregunta">Pregunta: <span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input type="text" placeholder="Ingrese la pregunta"  id="descripcion" name="descripcion" required="required" class="form-control col-md-7 col-xs-12">
        </div>
    </div>


    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" class="btn btn-success">Guardar</button>
            <button type="button" id="btn_preguntaCancelar" class="btn btn-warning hidden">Cancelar</button>
        </div>
    </div>
    <div class="ln_solid"></div>

</form>
<!-- tabla de los datos -->
<div class="table-responsive">
    <div class="row">
        <div class="col-sm-12">
            <table id="datatable-buttons" class="table table-striped table-bordered">
                <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 259px;">Pregunta</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 117px;">Acciones</th>
                </tr>
                </thead>


                <tbody>
                
                @if(isset($listaPreguntas))
                    @foreach($listaPreguntas as $item)
                        <tr role="row" class="odd">
                            <td >{{$item->descripcion}}</td>
                        
                            <td class="paddingTR">
                                <center>
                                <form method="POST" class="frm_eliminar" action="{{url('pregunta/'.encrypt($item->idpregunta))}}"  enctype="multipart/form-data">
                                    {{csrf_field() }} <input type="hidden" name="_method" value="DELETE">
                                    <button type="button" onclick="pregunta_editar('{{encrypt($item->idpregunta)}}')" class="btn btn-sm btn-primary marginB0"><i class="fa fa-edit"></i> Editar</button>
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