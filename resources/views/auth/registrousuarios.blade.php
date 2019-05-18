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
        <div class="col-md-7 ">
            <div class="md-form">
  <input type="search" id="form-autocomplete" class="form-control mdb-autocomplete">
  <button class="mdb-autocomplete-clear">
    <svg fill="#000000" height="24" viewBox="0 0 24 24" width="24" xmlns="https://www.w3.org/2000/svg">
      <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
      <path d="M0 0h24v24H0z" fill="none" />
    </svg>
  </button>
  <label for="form-autocomplete" class="active">What is your favorite US state?</label>
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