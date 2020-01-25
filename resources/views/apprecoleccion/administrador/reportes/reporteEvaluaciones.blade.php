<!DOCTYPE html>

<html>
<head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<style>
    body{
      font-family: sans-serif;
    }
    @page {
      margin: 50px 50px;
    }
    header { position: fixed;
      left: 0px;
      top: -160px;
      right: 0px;
      height: 100px;
      background-color: #ddd;
      text-align: center;
    }
    header h1{
      margin: 10px 0;
    }
    header h2{
      margin: 0 0 10px 0;
    }
    footer {
      position: fixed;
      left: 0px;
      bottom: -50px;
      right: 0px;
      height: 40px;
      border-bottom: 2px solid #ddd;
    }
    footer .page:after {
      content: counter(page);
    }
    footer table {
      width: 100%;
    }
    footer p {
      text-align: right;
    }
    footer .izq {
      text-align: left;
    }
  </style>
</head>
<body>
<h4><CENTER>EVALUACIÓN DE SERVICIOS</CENTER></h4>

</br>
<div class="row " style="border-style:solid; border:0.1px; margin:10px; padding:10px;" >
@if(isset($datosRespuesta))
<!-- DATOS INFORMATIVOS DE LA EVALUACION -->
    <div class="col-ms-6 text-right" style="width:100%; margin-right:200px;">
    <b> Evaluación:</b> {{$evaluacion->nombre}}
    </div>
    <div class="col-ms-6 text-right"  style="width:100%; margin-right:200px;">
    <b> Fecha de Inicio:</b> {{$evaluacion->fecha_inicio}}
    </div>
    <div class="col-ms-6 text-right"  style="width:100%; margin-right:200px;">
    <b> Fecha Fin:</b> {{$evaluacion->fecha_fin}}
    </div>
    <div class="col-ms-6 text-right"  style="width:100%; margin-right:200px;">
    <b> Objetivo:</b> {{$evaluacion->objetivo}}
    </div>
    <div class="col-ms-6 text-right"  style="width:100%; margin-right:200px;">
    <b> Total de Usuarios:</b> {{$totalUsuarios}}
    </div>

</div>
<!-- GRAFICAS DE LOS RESULTADOS DE LAS EVALUACIONES -->
  <div style="text-align:left;" id="columnchart_values" >
  {!!$chart!!}
  </div>


<!-- DIA ACTUAL Y NUMERO DE PAGINAS  -->
   
  <footer>
    <table>
      <tr>
        <td>
            <p class="izq">
            {{$today}}
            </p>
        </td>
        <td>
          <p class="page">
            Página
          </p>
        </td>
      </tr>
    </table>
  </footer>

@endif
</body>
</html>