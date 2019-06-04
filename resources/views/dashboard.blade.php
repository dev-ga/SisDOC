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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
	<div class="container">
        <a class="navbar-brand logo-font logo-font-dashboard navbar-brand-dashboard" href="#" id="brand">
            S!SDOC
        </a>
        <!-- links toggle -->
        <button class="navbar-toggler order-first" type="button" data-toggle="collapse" data-target="#links" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            
        </button>
        <!-- account toggle -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#account" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-user-circle" aria-hidden="true"></i>
        </button>
                
        {{-- botones lado izquierdo --}}
        <div class="collapse navbar-collapse" id="account">
            <ul class="navbar-nav ml-auto">
                {{-- <li class="nav-item"><a class="nav-link" href="#">Shopping Cart
                <i class="fa fa-shopping-cart fa-1x" aria-hidden="true"></i>
                </a></li> --}}
                <li class="nav-item dropdown">
                	<a class="dropdown-toggle nav-link-estilo" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user-circle  fa-user-circle-estilo" aria-hidden="true"></i>
					{{ auth()->user()->nombre }} {{ auth()->user()->apellido }}</a>
					<div class="dropdown-menu text-white" aria-labelledby="navbarDropdownMenuLink">
						<form class="" method="POST" action="{{ route('auth.logout') }}">
                        @csrf {{-- Para mostrar los errores si enviamos en formulario vasio --}}
                        <button class="dropdown-item" type="submit">Cerra Sesion</button>
                        </form>
                        
                     </div>
				</li>
            </ul>
        </div>
 </div>
</nav>
<div class="container">





            <div class="row justify-content-center mt">
            <div class="col-md-4">
                <div class="card text-center card-dashboard">
  <i class="fas fa-file-pdf fas-estilo"></i>
  <div class="card-body">
    <h4 class="card-title">Recibo de pago</h4>
    
    <a href="{{ route('recibo.form') }}" class="btn btn-primary">GENERAR</a>
  </div>
</div>
            </div>
            <div class="col-md-4">
                <div class="card text-center card-dashboard">
  <i class="fas fa-file-invoice fas-estilo"></i>
  <div class="card-body">
    <h4 class="card-title">Calculo ARC</h4>
    
    <a href="{{ route('arc.form') }}" class="btn btn-primary">GENERAR</a>
  </div>
</div>
            </div>
            {{-- <div class="col-md-4">
                <div class="card text-center card-dashboard">
  <i class="fas fa-file-word fas-estilo"></i>
  <div class="card-body">
    <h4 class="card-title">Costancia de Trabajo</h4>
    
    <a href="#!" class="btn btn-primary">GENERAR</a>
  </div>
</div>
            </div> --}}

        </div>
    </div>  





























<script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
<script src="{{ asset('js/jquery.slim.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>