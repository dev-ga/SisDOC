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
        {{-- <img class="img-fluid" src="{{ asset('images/logo_fundeeh.png') }}" alt=""> --}} {{-- logo de fundeeh en formato png --}}
        <img class="img-fluid" src="{{ asset('images/sisdoc.png') }}" alt="" width="95px">
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
    <div class="header-texto text-center mt-4">
            <h2>Formulario de Registro</h2>
            <h5>Debe llenar todos los campo para ser registrado de forma correcta</h5>
            <hr>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-10 ">
            <div class="card card-registro mt-4 mb-4">
               <form class="p-4" method="POST" action="{{ route('authvalidate.registro') }}">
                {{-- {{ csrf_field() }} --}}
                @csrf {{-- Para mostrar los errores si enviamos en formulario vasio --}}

                   <div class="row">
                       
                           <div class="col-md-6">
                            <!-- Nombre -->
                            
                            <div class="form-group input mb-2">
                                  <label for="nombre" class="titulolabel">Nombre</label>
                            <input name="nombre" type="text" id="nombre" class="form-control input-style icon"   placeholder="&#xf007;">
                            {!! $errors->first ('nombre', '<span class="badge badge-danger">:message</span>') !!}
                              
                          </div>
                            
                            <!-- Cedula -->
                            <div class="form-group  mb-2">
                                <label for="cedula" class="titulolabel">Cedula</label>
                            <input name="cedula" type="text" id="cedula" class="form-control input-style icon"  placeholder="&#xf2c2;">
                            {!! $errors->first ('cedula', '<span class="badge badge-danger">:message</span>') !!}
                                
                          </div> 
                            
                            <!-- Email -->
                            <div class="form-group  mb-2">
                                <label for="email" class="titulolabel">Correo</label>
                                
                            <input name="email" type="email" id="email" class="form-control input-style icon"  placeholder="&#xf1fa;">
                            {!! $errors->first ('email', '<span class="badge badge-danger">:message</span>') !!}
                                
                          </div>

                            <!-- Pregunta de Seguridad -->
                            <div class="form-group  mb-2">
                                <label for="pregunta_id" class="titulolabel">Pregunta de Seguridad</label>
                            {{--  <input name="apellido" type="text" id="apellido" class="form-control input-style icon"  placeholder="&#xf1ad">
                            {!! $errors->first ('apellido', '<span class="badge badge-danger">:message</span>') !!}
                            </div>  --}}
                            <select name="pregunta_id" class="form-control input-style icon" placeholder="&#xf1fa;">
                                <option value=""></option>
                                @foreach($pregunta as $pregunta)
                                <option value="{{ $pregunta->id }}">{{ $pregunta->pregunta }}</option>
                            @endforeach
                            </select>
                          </div>
                           </div>
                           <div class="col-md-6">
                            <!-- Apellido -->
                            <div class="form-group  mb-2">
                                <label for="apellido" class="titulolabel">Apellido</label>
                            <input name="apellido" type="text" id="apellido" class="form-control input-style icon"  placeholder="&#xf0c0">
                            {!! $errors->first ('apellido', '<span class="badge badge-danger">:message</span>') !!}
                            </div>

                            <!-- Organizacion -->
                            <div class="form-group  mb-2">
                                <label for="organizacion_id" class="titulolabel">Organización</label>
                            
                            <select name="organizacion_id" class="form-control input-style icon">
                                <option value=""></option>
                                    @foreach($organizacion as $organizacion)
                                        <option value="{{ $organizacion->id }}">{{ $organizacion->descripcion_sigesp }}</option>
                                    @endforeach
                            </select>
                          </div>

                            <!-- Password -->
                            <div class="form-group  mb-2">
                                <label for="password" class="titulolabel">Password</label>
                            <input name="password" type="password" id="password" class="form-control input-style icon"  placeholder="&#xf084">
                            {!! $errors->first ('password', '<span class="badge badge-danger">:message</span>') !!}
                            </div>

                            <!-- Respuesta -->
                            <div class="form-group  mb-2">
                                <label for="respuesta" class="titulolabel">Respuesta</label>
                            <input name="respuesta" type="text" id="nombre" class="form-control input-style icon"  placeholder="&#xf09c">
                            {!! $errors->first ('respuesta', '<span class="badge badge-danger">:message</span>') !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                          
                            <div class="form-group">
                              <label for="rol_id">Tipo de Usuario</label>
                              <input type="text" id="rol_id" name="rol_id" class="form-control input-style" placeholder="Debe Colocar 1 por default">
                              
                            </div>
                         
                        </div>
                    <!-- Sign in button -->
                    <button class="btn btn-info btn-block my-2 btn-registro btn-info-registro" type="submit">Registrar</button>
                </form>
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