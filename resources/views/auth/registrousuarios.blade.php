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
            <div class="card ">
                <div class="card-body">
                    <h1 class="card-title text-center">S!SDOC</h1>
                    <h6 class="card-subtitle mb-2 text-muted text-center">Sistema de Documentos Interactivos</h6>
                    <hr>
                    <p class="card-text ">
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
            
            <form> 
                <div class="form-group"> 
                    {{-- <label for="Nombre">Nombre</label> --}}
                    <input name="nombre" class="form-control border-bottom" id="formGroupExampleInput" placeholder="Example input">
                </div> 
                <div class="form-group"> 
                    {{-- <label for="apellido">Apellido</label> --}}
                    <input name="apellido" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                </div>
                <div class="form-group"> 
                    {{-- <label for="cedula">Cedula de Identidad</label> --}}
                    <input name="cedula" class="form-control border-bottom" id="formGroupExampleInput" placeholder="Example input">
                </div> 
                <div class="form-group"> 
                    {{-- <label for="organizacion_id">Organizacion</label> --}}
                    <input name="organizacion_id" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                </div>
                <div class="form-group"> 
                    {{-- <label for="email">E-mail</label> --}}
                    <input name="email" class="form-control border-bottom" id="formGroupExampleInput" placeholder="Example input">
                </div> 
                <div class="form-group"> 
                    {{-- <label for="password">Password</label> --}}
                    <input name="password" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                </div>
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