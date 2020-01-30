<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gestión de Desechos</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
             <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
              <img  class="" src="images/logochone.png" width="36%">
              <h2>Autenticación de usuario</h2>
              
              <br/>
              <div class="col-xs-12 form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                  <input id="email" type="email" class="form-control has-feedback-left" name="email" placeholder="usuario" style="margin-bottom: 8px;" required autofocus>
                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                  @if ($errors->has('email'))
                      <span class="help-block" role="alert" style="margin-bottom: 0px;">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>

              <div class="col-xs-12 form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                  <input id="password" type="password" class="form-control has-feedback-left" name="password" placeholder="contraseña" style="margin-bottom: 8px;" required>
                  <span class="glyphicon glyphicon-lock form-control-feedback left" aria-hidden="true"></span>
                  @if ($errors->has('password'))
                      <span class="help-block" role="alert" style="margin-bottom: 0px;">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
              </div>
              
          

              <div class="col-md-12 col-sm-12 col-xs-12" >
                <button type="submit" class="btn btn-success btn-block submit">Aceptar</button>
                
              </div>

              <div class="clearfix"></div>

              <div class="separator">
          
                </p>

                <div class="clearfix"></div>
                <br/>

                <div>
              
                  <p> © 2020 GADM Chone </p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            
          </section>
        </div>
      </div>
    </div>


  </body>
</html>


