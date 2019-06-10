<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SisDoc - Fundeeh</title>
<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('css/estilos.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('fonts/fontawesome/css/fontawesome.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('fonts/fontawesome/css/brands.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('fonts/fontawesome/css/solid.css') }}" rel="stylesheet" type="text/css">

</head>
<body class="viewport">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
  <div class="container">
    <a class="navbar-brand" href="#">
        {{-- <img class="img-fluid" src="{{ asset('images/logo_fundeeh.png') }}" alt=""> --}} {{-- logo de fundeeh en formato png --}}
          SISDOC
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        {{-- menu principal --}}
        
    {{-- fin --}}
      <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
          <a class="nav-link  disabled " href="">
            <i class="fas fa-fingerprint">  Login</i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  disabled" href="">
            <i class="fas fa-user-circle">  Registro</i>
            </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container mt-5">
  
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card card-login">
          
            <div class="card-body card-body-login">
              
              <form class="" method="POST" action="{{ route('validacion') }}">

              @csrf {{-- Para mostrar los errores si enviamos en formulario vasio --}}
              
              <div class="form-group">
              <input type="email" name="email" id="email" class="form-control form-control-sm form-control-sm-login form-control-login " placeholder="Intraduzca de dirección de email">
              {!! $errors->first ('email', '<span class="badge badge-danger">:message</span>') !!}
              </div>
              <button class="btn btn-info btn-block my-2 form-control-sm form-control-sm-login btn-login btn-info-login" type="submit">Validar Email</button>
              
              </form>
              
              
            </div>
         </div>
      </div>
    </div>
   
</div>
</div>
<script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
<script src="{{ asset('js/jquery.slim.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>