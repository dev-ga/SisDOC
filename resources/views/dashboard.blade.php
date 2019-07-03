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
<link href="{{ asset('fonts/fontawesome/css/regular.css') }}" rel="stylesheet" type="text/css">
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
	<div class="container">
        <a class="navbar-brand logo-font logo-font-dashboard navbar-brand-dashboard" href="#" id="brand">
            <img class="img-fluid" src="{{ asset('images/sisdoc.png') }}" alt="" width="95px">
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
            <div class="row justify-content-center mt-5"> 
<div class="col-md-4">
<div class="card card-dashboard-rp">
<i class="far fa-file-pdf fas-estilo"></i>
<div class="card-body prueba111">
<strong><p>Recibo de Pago</p></strong>
</div>
<div class="boton-flecha">
<a href="{{ route('recibo.form') }}"><i class="far fa-arrow-alt-circle-right"></i></a>
</div>
</div>
</div>
{{--  fin del div row  --}}
</div> 


<div class="row justify-content-center "> 
<div class="col-md-4">
<div class="card card-dashboard-arc">
<i class="far fa-file-pdf fas-estilo"></i>
<div class="card-body prueba111">
<strong><p>Arc</p></strong>
</div>
<div class="boton-flecha">
    <a href="{{ route('arc.form') }}"><i class="far fa-arrow-alt-circle-right"></i></a>
    
</div>
</div>
</div>
{{--  fin del div row  --}}
</div> 


<div class="row justify-content-center "> 
    <div class="col-md-4">
    <div class="card card-dashboard-sc">
    <i class="fas fa-cogs fas-estilo"></i>
    <div class="card-body prueba111">
    <strong><p>Solicitud de Constancia</p></strong>
    </div>
    <div class="boton-flecha">
        <a href="{{ route('solicitudform') }}"><i class="far fa-arrow-alt-circle-right"></i></a>
    </div>
    </div>
    </div>
    {{--  fin del div row  --}}
    </div>

    @if (auth()->user()->rol_id == 1)
    <div class="row justify-content-center "> 
        <div class="col-md-4">
        <div class="card card-dashboard-esc">
        <i class="far fa-clock fas-estilo"></i>
        <div class="card-body prueba111">
        <strong><p>Estatus de Solicitudes</p></strong>
        </div>
        <div class="boton-flecha">
            <a href="{{ route('missolicitudes') }}"><i class="far fa-arrow-alt-circle-right"></i></a>
        </div>
        </div>
        </div>
      </div>
      @endif

      @if (auth()->user()->rol_id == 2)
    <div class="row justify-content-center "> 
        <div class="col-md-4">
        <div class="card card-dashboard-esc">
        <i class="fas fa-list-ol fas-estilo"></i>
        <div class="card-body prueba111">
        <strong><p>Listar Solicitudes</p></strong>
        </div>
        <div class="boton-flecha">
            <a href="{{ route('listarsolicitudes') }}"><i class="far fa-arrow-alt-circle-right"></i></a>
        </div>
        </div>
        </div>
      </div>
      @endif
      @if (auth()->user()->rol_id == 3)
      <div class="row justify-content-center "> 
          <div class="col-md-4">
          <div class="card card-dashboard-esc">
          <i class="fas fa-list-ol fas-estilo"></i>
          <div class="card-body prueba111">
          <strong><p>Listar Solicitudes</p></strong>
          </div>
          <div class="boton-flecha">
              <a href="{{ route('listarsolicitudes') }}"><i class="far fa-arrow-alt-circle-right"></i></a>
          </div>
          </div>
          </div>
        </div>

        <div class="row justify-content-center "> 
            <div class="col-md-4">
            <div class="card card-dashboard-usu">
            <i class="fas fa-list-ol fas-estilo"></i>
            <div class="card-body prueba111">
            <strong><p>Listar Usuarios</p></strong>
            </div>
            <div class="boton-flecha">
                <a href="{{ route('listar-usuarios') }}"><i class="far fa-arrow-alt-circle-right"></i></a>
            </div>
            </div>
            </div>
          </div>

          {{--  <div class="row justify-content-center "> 
              <div class="col-md-4">
              <div class="card card-dashboard-emp">
              <i class="fas fa-list-ol fas-estilo"></i>
              <div class="card-body prueba111">
              <strong><p>Listar Empresas</p></strong>
              </div>
              <div class="boton-flecha">
                  <a href="{{ route('solicitudform') }}"><i class="far fa-arrow-alt-circle-right"></i></a>
              </div>
              </div>
              </div>
            </div>
            <div class="row justify-content-center "> 
                <div class="col-md-4">
                <div class="card card-dashboard-nom">
                <i class="fas fa-list-ol fas-estilo"></i>
                <div class="card-body prueba111">
                <strong><p>Listar Nominas</p></strong>
                </div>
                <div class="boton-flecha">
                    <a href="{{ route('solicitudform') }}"><i class="far fa-arrow-alt-circle-right"></i></a>
                </div>
                </div>
                </div>
              </div>  --}}

              <div class="row justify-content-center mb-5 "> 
                  <div class="col-md-4">
                  <div class="card card-dashboard-pc">
                  <i class="far fa-clock fas-estilo"></i>
                  <div class="card-body prueba111">
                  <strong><p>Periodos Cerrado</p></strong>
                  </div>
                  <div class="boton-flecha">
                      <a href="{{ route('solicitudform') }}"><i class="far fa-arrow-alt-circle-right"></i></a>
                  </div>
                  </div>
                  </div>
                </div>
        @endif

    
        {{--  fin del div row  --}}
        

<script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
<script src="{{ asset('js/jquery.slim.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>