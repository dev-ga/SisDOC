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
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('auth.login') }}">
            <i class="fas fa-fingerprint">  Login</i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ route('auth.registrousuarios') }}">
            <i class="fas fa-user-circle">  Registro</i>
            </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
    <div class="header-texto text-center mt-4 text-white">
            <h2>Formulario de Registro</h2>
            <h5>Debe llenar todos los campo para ser registrado de forma correcta</h5>
            <hr>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-5 col-sm-10 ">
            <div class="card card-registro mt-4">
               <form class="p-4" method="POST" action="{{ route('authvalidate.registro') }}">
                {{-- {{ csrf_field() }} --}}
                @csrf {{-- Para mostrar los errores si enviamos en formulario vasio --}}

                    <!-- Nombre -->
                    <div class="form-group  mb-2">
                        <label for="nombre" class="titulolabel">Nombre</label>
                    <input name="nombre" type="text" id="nombre" class="form-control form-control-registro "  autofocus>
                    {!! $errors->first ('nombre', '<span class="badge badge-danger">:message</span>') !!}
                    </div>


                    <!-- Apellido -->
                    <div class="form-group  mb-2">
                        <label for="apellido" class="titulolabel">Apellido</label>
                    <input name="apellido" type="text" id="apellido" class="form-control form-control-registro " >
                    {!! $errors->first ('apellido', '<span class="badge badge-danger">:message</span>') !!}
                    </div>


                    <!-- Cedula -->
                    <div class="form-group  mb-2">
                        <label for="cedula" class="titulolabel">Cedula de Identidad</label>
                    <input name="cedula" type="text" id="ci" class="form-control form-control-registro " >
                    {!! $errors->first ('cedula', '<span class="badge badge-danger">:message</span>') !!}
                    </div>


                    <!-- Organizacion -->
                    <div class="form-group  mb-2"> 
                        <label for="organizacion" class="titulolabel">Organizacion</label>

                    <select name="organizacion_id" class="form-control form-control-registro ">
                        <option value="">-- Perteneces a...? --</option>
                            @foreach($organizacion as $organizacion)
                                <option value="{{ $organizacion->id }}">{{ $organizacion->descripcion_sigesp }}</option>
                            @endforeach
                    </select>
                    {!! $errors->first ('organizacion_id', '<span class="badge badge-danger">:message</span>') !!}
                    </div>


                    <!-- email -->
                    <div class="form-group  mb-2">
                        <label for="email" class="titulolabel">Email</label>
                    <input name="email" type="email" id="email" class="form-control form-control-registro ">
                    {!! $errors->first ('email', '<span class="badge badge-danger">:message</span>') !!}
                    </div>


                    <!-- password -->
                    <div class="form-group  mb-2">
                        <label for="password" class="titulolabel">Password</label>
                    <input name="password" type="password" id="password" class="form-control form-control-registro ">
                    {!! $errors->first ('password', '<span class="badge badge-danger">:message</span>') !!}
                    </div>


                                       
                    <!-- Sign in button -->
                    <button class="btn btn-info btn-block my-2 btn-registro btn-info-registro" type="submit">Registrar</button>


                </form>
        </div>
    </div>
    

</div>
<script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
<script src="{{ asset('js/jquery.slim.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>