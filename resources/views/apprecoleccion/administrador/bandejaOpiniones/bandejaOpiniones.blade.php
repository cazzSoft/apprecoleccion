<!-- BANDEJA DE OPINIONES -->
<form id="frm_opiniones" method="POST" action="{{url('bandejaOpiniones')}}"  enctype="multipart/form-data"  class="form-horizontal form-label-left">
    {{csrf_field() }}
    <input id="method_opiniones" type="hidden" name="_method" value="POST">

<!-- MENSAJES PARA CONFIRMACIÓN DE REGISTROS Y ERRORES -->
    @if(session()->has('mensajeInfoBandejaOpiniones'))
        <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre_menu"></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="alert alert-{{session('estado')}} alert-dismissible fade in" role="alert" style="margin-bottom: 0;">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Información: </strong> {{session('mensajeInfoBandejaOpiniones')}}
                </div>
            </div>
        </div>
    @endif
<!-- bandeja de opiniones -->

    <button type="button" class="btn btn-sm btn-danger marginB0" onclick=""><i class="fa fa-trash"></i> Eliminar todos los Registros</button>
    <div class="ln_solid"></div>
</form>
<div class="table-responsive">
    <div class="row">
        <div class="col-sm-12">
            <table id="datatable-checkbox" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                <thead>
                <tr role="row">
                    <th class="sorting_desc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" aria-sort="descending">Opinión</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Usuario</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Fecha</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" >Acciones</th>
                </tr>
                </thead>
                <tbody>

                @if(isset($listaOpiniones))
                    @foreach($listaOpiniones as $item)             
                    <tr role="row" class="odd">
                        <td class="sorting_1">{{$item->detalle}}</td>
                        <td >{{$item->usuario->nombre}}</td>
                        <td >{{$item->fecha}}</td>
                        <td   class="paddingTR">
                            <center>
                                <form method="POST" class="frm_eliminar" action="{{url('bandejaOpiniones/'.encrypt($item->idopiniones))}}"  enctype="multipart/form-data">
                                    {{csrf_field() }} <input type="hidden" name="_method" value="DELETE">
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
       