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
<body>
<div class="container-fluid h-100">
    <div class="row h-100 ">
        <div class="col-md-5 left d-flex align-self-center h-100">
            <div class="card fondo-card-izquierdo">
                <div class="card-body">
                    <h1 class="card-title text-center card-texto-izquierda ">S!SDOC</h1>
                    <h6 class="card-subtitle mb-2 text-muted text-center">Sistema de Documentos Interactivos</h6>
                    <hr>
                    <p class="card-text card-texto-izquierda ">
                     Debe llenar en su totalidad el formulario de resgistro para poder interactuar de forma segura con la aplicación
                        Si tiene alguna duda por favor contacte al administrador del Sistema o comuniquese con la Oficina de Tecnología.
                    </p>
                </div>
            </div>  
        </div>

        <div class="col-md-7">
            <div class="container-fluid h-100">
            <div class="row h-100   right d-flex align-self-center">
            
        <div class="col-md-10 ">
            <h3 class="card-title text-center">Formulario de Registro</h3>
            
            <form method="POST" action="{{ route('authvalidate.registro') }}"> 
                
                @csrf{{-- errores del formularios --}}

                <div class="form-group "> 
                    <label for="Nombre">Nombre Completo</label>
                    <input type="text" name="nombre" class="form-control bordes" id="formGroupExampleInput" autofocus>
                </div> 
                <div class="form-group"> 
                    <label for="apellido"> Primer Apellido</label>
                    <input type="text" name="apellido" class="form-control bordes" id="formGroupExampleInput2">
                </div>
                <div class="form-group"> 
                    <label for="cedula">Cedula de Identidad</label>
                    <input type="text" name="cedula" class="form-control bordes" id="formGroupExampleInput" >
                </div> 
                <div class="form-group"> 
                    <label for="organizacion_id">Organizacion</label>
                    {{-- <input name="organizacion_id" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                </div> --}}
                    <select name="organizacion_id" class="form-control estilosinputregistro mb-2 bordes">
                        <option value="">-- Perteneces a...? --</option>
                            @foreach($organizacion as $organizacion)
                                <option value="{{ $organizacion->id }}">{{ $organizacion->descripcion_sigesp }}</option>
                            @endforeach
                    </select>
                <div class="form-group"> 
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control bordes" id="formGroupExampleInput" >
                </div> 
                <div class="form-group"> 
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control bordes" id="formGroupExampleInput2" >
                </div>
                <!-- Sign in button -->
                <button class=" estilosbutton btn btn-info btn-block my-5" type="submit">Registrar</button>
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