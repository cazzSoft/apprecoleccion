@extends('apprecoleccion.home_recoleccion')

@section('content1')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body text-center">
                    <div class="bs-example" data-example-id="simple-jumbotron">
                        <div class="jumbotron">
                            <h1>Hola, Bienvenido!</h1>
                            <p>Gestión Administrativa de la Recolección de Desechos</p>
                        </div>
                        <div class="">
                            <div class="x_panel fixed_height_390">
                                <div class="x_content">
                                   <form class="form-control"  enctype="multipart/form-data"   method="POST" id="formularioFactura" >
                                         @csrf
                                     <div class="form-group">
                                       <label for="exampleInputEmail1">Email address</label>
                                       <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                       <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                     </div>
                                     <div class="form-group">
                                       <label for="exampleInputPassword1">Password</label>
                                       <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                     </div>

                                     <button type="submit" class="btn btn-primary">Submit</button>
                                   </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('/js/rutaMapa.js')}}"></script>
@endsection
