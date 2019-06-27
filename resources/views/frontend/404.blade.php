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
<style type="text/css">
    @font-face {
    font-family: RalewayExtraLight;
    font-style: normal;
  font-weight: 900;
    src: url('{{ asset('fonts/RalewayExtraLight.ttf') }}');
}
</style>
</head>
<body>
    
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card text-center card-ui-error">
  <div class="card-body">
    <h1 class="card-title card-title-ui-error mt-5"><strong>ERROR</strong></h1>
  </div>
  {{-- <span><i class="fas fa-check-circle fas-check fa-check-circle-ui"></i></span> --}}
  <img class="img-fluid" src="{{ asset('images/404.jpg') }}" alt="404-error">
 
  <div class="card-body">
    
    <p>POR FAVOR CONTECTE CON EL ADMINISTRADOR DE SISTEMA</p>
    <a href="{{ route('auth.login') }}" class="btn btn-primary mt-5 bg-danger btn-ui">Volver al inicio</a>
    {{-- <button type="button" class="btn-block btn btn-primary btn-lg-ui bg-white btn-text-green mt-4">Login</button> --}}
  </div>
  
</div>
                </div>
            </div>
        </div>
<<script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
<script src="{{ asset('js/jquery.slim.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>