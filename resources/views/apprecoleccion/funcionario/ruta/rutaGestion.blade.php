@extends('apprecoleccion.home_recoleccion')

@section('content1')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-center">
                  
                   @include('apprecoleccion.funcionario.ruta.rutas')
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
