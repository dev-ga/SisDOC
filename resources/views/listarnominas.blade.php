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
            {{-- Menu princial --}}
            <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('listar-usuarios') }}">Usuarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('listar-empresas') }}">Empresas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('listar-nominas') }}">Nominas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('listar-usuarios') }}">Periodos Cerrados</a>
      </li>
   
      
      
    </ul>
    {{-- fin menu principal --}}
            
        </div>
 </div>
</nav>


<section>
    

<div class="container-fluid">
    <div class="row justify-content-center mt-5 ">
        <div class="col-md-8">
            <table class="table table-striped">
                
  <thead class="thead-dark">
    <tr> <!-- encabezado de tabla -->
               <td colspan="8" class="text-center bg-dark text-white">Usuarios Registrados</td> 
            </tr>
    <tr>
      <th scope="col">Codigo Empresa</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripción</th>
      
      

    </tr>
  </thead>
  @foreach ($querynominas as $nominas)

  <tbody>
    <tr>
      <th scope="row">{{ $nominas->codemp }}</th>
      <td>{{ $nominas->codnom }}</td>
      <td>{{ $nominas->desnom }}</td>
      
      
    </tr>
  </tbody>

  @endforeach
</table>
{{-- {{ $usuario->render() }} --}}
        </div>
 
    </div>
</div>
<script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
<script src="{{ asset('js/jquery.slim.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>