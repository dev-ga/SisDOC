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
<body class="viewport imagen">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
  <div class="container">
    <a class="navbar-brand" href="#">
        <img class="img-fluid" src="asset('images/logofundeeh.png')" alt="">
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
                  <label for="cedula" class="titulolabel">Cedula</label>
                <input type="text" name="cedula" id="cedula" class="form-control form-control-sm form-control-sm-login form-control-login input-style ">
                {!! $errors->first ('cedula', '<span class="badge badge-danger">:message</span>') !!}
                </div>

              {{--  Preguntas  --}}
              <div class="form-group  mb-2"> 
              <label for="pregunta" class="titulolabel">Pregunta de seguridad</label>
              <select name="pregunta_id" class="form-control input-style ">
              <option value="">-- Selecciona tu pregunta de Seguridad...? --</option>
                    @foreach($pregunta as $pregunta)
                        <option value="{{ $pregunta->id }}">{{ $pregunta->pregunta }}</option>
                    @endforeach
              </select>
              {!! $errors->first ('pregunta_id', '<span class="badge badge-danger">:message</span>') !!}
              </div>

            {{--  Respuesta  --}}
              <div class="form-group">
                  <label for="pregunta" class="titulolabel">Respuesta</label>
                <input type="text" name="respuesta" id="respuesta" class="form-control form-control-sm form-control-sm-login form-control-login input-style mb-5 " >
                {!! $errors->first ('respuesta', '<span class="badge badge-danger">:message</span>') !!}
                </div>
              <button class="btn btn-info btn-block my-2 form-control-sm form-control-sm-login btn-login btn-info-login" type="submit">Validar</button>
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