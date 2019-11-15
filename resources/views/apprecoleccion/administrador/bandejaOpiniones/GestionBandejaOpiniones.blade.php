@extends('apprecoleccion.home_recoleccion')

@section('content1')
<!-- Datatables -->
<link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <!-- <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"> -->
<link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-center">
                <div class="x_title">
                <center><h4><b>BANDEJA DE OPINIONES DE LA APLICACIÓN MÓVIL</b></h4></center>
                    <div class="clearfix"></div>
                </div>
                   @include('apprecoleccion.administrador.bandejaOpiniones.bandejaOpiniones')
                </div> 
            </div>
        </div>
    </div>
</div>


 <!-- Datatables -->
 <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="{{asset('/js/GestionOpiniones.js')}}"></script>
@endsection

