@extends('apprecoleccion.home_recoleccion')

@section('content1')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-center">
                    <div class="bs-example" data-example-id="simple-jumbotron">
                        <div class="content">
                            <div class="title m-b-ms" align="center">
                                <img src="{{asset('images/header1.png')}}" style=" width: 100%;" ><br>
                                <img src="{{asset('images/mapa.PNG')}}" style=" width: 100%;opacity: 0.8"  ><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
