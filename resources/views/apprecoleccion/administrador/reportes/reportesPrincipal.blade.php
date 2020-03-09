@extends('apprecoleccion.home_recoleccion')
@section('content1')
<!-- Datatables -->
<link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  
<link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
 <!-- Datatables -->
<script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="{{asset('/js/GestionOpiniones.js')}}"></script>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-center">
                    <div class="x_title">
                    <center><h4><b>EVALUACIONES REALIZADAS POR LOS USUARIOS DE LA APLICACIÓN MÓVIL</b></h4></center>
                        <div class="clearfix"></div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
<!-- BNADEJA DE EVALUACIONES REALIZADAS -->
<form id="frm_evaluaciones" method="POST" action="{{url('reportes')}}"  enctype="multipart/form-data"  class="form-horizontal form-label-left">
    {{csrf_field() }}
    <input id="method_evaluaciones" type="hidden" name="_method" value="POST">
  
 <div class="ln_solid"></div>
</form>
@if(isset ($datosPreguntaEvaluacion))
<div class="table-responsive">
    <div class="row">
        <div class="col-sm-12">
        <table id="datatable-checkbox" class="table table-striped table-bordered dataTable no-footer" role="grid" aria-describedby="datatable_info">
                <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 259px;">Nombre de la Evaluación</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 259px;">Fecha de Inicio</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 259px;">Fecha Fin</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 259px;">Objetivo</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 117px;">Acciones</th>
                </tr>
                </thead>


                <tbody>
                @foreach($datosPreguntaEvaluacion as $n)
             
                        <tr role="row" class="odd">
                            <td >{{$n->evaluacion->nombre}}</td>
                            <td >{{$n->evaluacion->fecha_inicio}}</td>
                            <td >{{$n->evaluacion->fecha_fin}}</td>
                            <td >{{$n->evaluacion->objetivo}}</td>
                            <td class="paddingTR">
                                <div class="form-group col-md-12">
                                    <a onclick="ver({{$n->evaluacion->idevaluacion}})" id="button" class="btn btn-sm btn-success btn-block"  >VISUALIZAR    <i class="fa fa-eye"></i></a>
                                    <!-- <a href="ReporteEvaluacionServiciosIndividual/{{$n->evaluacion->idevaluacion}}" class="btn btn-sm btn-success btn-block"  target="_blank">IMPRIMIR REPORTE    <i class="fa fa-print"></i></a> -->
                                    
                                </div>   
                            </td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
   
</div>

<div id="GraficasResultados" style="display:none;">
<!-- formulario donde se envia las graficas al pdf-->
    <div align="center"  >
        <form method="post" id="make_pdf"  action="{{url('/ReporteEvaluacionServiciosIndividual')}}" target="_blank">
        {{csrf_field() }}
            <input type="hidden" name="hidden_html" id="hidden_html"/>
            <input type="hidden" name="id" id="id"/>
            </br>
    
            <button type="submit" name="create_pdf" id="create_pdf" class="btn btn-sm btn-primary">IMPRIMIR REPORTE   <i class="fa fa-print"></i></button>
        </form>
    </div>
<!-- visualizacion de los resultados con sus graficas -->
    <div class="container" id="testing">    
    <div class="panel panel-default">
            <div class="panel-heading">
                <h5 class="panel-title" align="center">RESULTADOS OBTENIDOS </h5>
            </div>
            <div class="panel-body" align="center">
                <div id="contenidoHtml" class="row" >
                </div>
            </div>
    </div>
    </div>
</div>
@endif

<!-- para esconder y ocultar la visualizacion de los resultados -->

<!-- el desarrollo de las graficas con google charts -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>

$(document).ready(function(){
    $('#create_pdf').click(function(){
        
        $("#make_pdf").submit();
    });
   
});

</script>
<script type="text/javascript">
//metodo para las puntaciones obtenidas en las preguntas de las evalauciones para mostrar en la grafica
function ver(id){
   
//mostrar el div que esta oculto
      document.getElementById('GraficasResultados').style.display="block";
//obtener puntaciones para las graficas
$("#contenidoHtml").html("");
 var url="{{url('ObtenerDatos')}}/"+id;
 var contenido="";
 $.ajax({
     async: false,
     type: 'GET',
     url: url,
     success: function(data) {
        $.each( data[0], function( key, value ) {
    var html="";
    
    html="<div id='columnchart_values"+value.idpregunta+"' style='width: 900px; height: 300px;'></div>";
    $("#contenidoHtml").append(html);
   //variables para los datos de las puntaciones obtenidas
    var valor1=0;
    var valor5=0;
    var valor4=0;
    var valor3=0;
    var valor2=0;
    var url2="{{url('ObtenerRespuestas')}}/"+value.idpregunta;
    $.ajax({
     async: false,
     type: 'GET',
     url: url2,
     success: function(data2) {
        $.each( data2, function( key2, value2 ) {
                //sumando los puntajes
                if(value2.puntaje=="1")
                {
                    valor1=valor1+1;
                    
                }
                if(value2.puntaje=="2")
                {
                    valor2=valor2+1;
                    
                }
                if(value2.puntaje=="3")
                {
                    valor3=valor3+1;
                    
                }
                if(value2.puntaje=="4")
                {
                    valor4=valor4+1;
                    
                }
                if(value2.puntaje=="5")
                {
                    valor5=valor5+1;
                    
                }
                });
            }
            });
// datos enviados a la grafica
            drawChart(value.idpregunta,value.descripcion,valor1,valor2,valor3,valor4,valor5)
            });
       }
    });
//valores del form
 $('#hidden_html').val($('#testing').html());
 $('#id').val(id);
}

//leyendas de los graficos
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart(id,name,valor1,valor2,valor3,valor4,valor5) {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Density", { role: "style" } ],
        ["1 punto", valor1, "#b87333"],
        ["2 puntos", valor2, "silver"],
        ["3 puntos", valor3, "gold"],
        ["4 puntos", valor4, "color: #e5e4e2"],
        ["5 puntos", valor5, "color: #e6b3ff"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: name,
        width: 600,
        height: 300,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      
   
      var idchart=document.getElementById("columnchart_values"+id);
      var chart = new google.visualization.ColumnChart(idchart);
      //chart.draw(view, options);
      google.visualization.events.addListener(chart,'ready',function(){
        idchart.innerHTML='<img src="'+chart.getImageURI()+'" class="img-responsive">';
      });
      chart.draw(view, options);
  }
  </script>

@endsection