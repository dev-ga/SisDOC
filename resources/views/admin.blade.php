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
        <a class="nav-link" href="{{ route('actualiza') }}">Acciones Administrador</a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('arc.form') }}">Eliminar Usuario</a>
      </li> --}}
      
    </ul>
    {{-- fin menu principal --}}
            
        </div>
 </div>
</nav>
<section>
    

<div class="container-fluid">
    <div class="row justify-content-center mt-5">

        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-success text-center">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="icon-user text-center">
                                    <i class="fas fa-user-plus"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-title text-center total">
                                    <p>{{ $totalusuarios }}</p>
                                </div>
                            </div>
                        </div>
                     <div class="card-title card-title-ui">
                        <hr>
                         <p><strong>Usuarios Registrados</strong></p>
                     </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-primary text-center">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="icon-user text-center">
                                    <i class="fas fa-building"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-title text-center total">
                                    <p>{{ $totalorga }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-title card-title-ui">
                        <hr>
                         <p><strong>Empresas Registradas</strong></p>
                     </div>
                    </div>

                </div>
            </div>



        </div>

        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-warning text-center">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="icon-user text-center">
                                    <i class="fas fa-database"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-title text-center total">
                                    <p>{{ $totalnominas }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-title card-title-ui">
                        <hr>
                         <p><strong>Nominas Sincronizadas</strong></p>
                     </div>
                    </div>

                </div>
            </div>


            
        </div>

        <div class="col-md-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-danger text-center">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="icon-user text-center">
                                    <i class="fas fa-money-check"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-title text-center total">
                                    <p>{{ $totalperi }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-title card-title-ui">
                        <hr>
                         <p><strong>Periodos Calculados</strong></p>
                     </div>
                    </div>

                </div>
            </div>


            
        </div>

        




    </div>
</div>
</section>

<section>
    

<div class="container-fluid">
    <div class="row justify-content-center mt-5 ">
        <div class="col-md-6">
            <table class="table table-striped">
                
  <thead class="thead-dark">
    <tr> <!-- encabezado de tabla -->
               <td colspan="6" class="text-center bg-dark text-white">Usuarios Registrados</td> 
            </tr>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Cedula</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  @foreach ($usuario as $usuari)

  <tbody>
    <tr>
      <th scope="row">{{ $usuari->id }}</th>
      <td>{{ $usuari->nombre }}</td>
      <td>{{ $usuari->apellido }}</td>
      <td>{{ $usuari->cedula }}</td>
      <td>{{ $usuari->email }}</td>
    </tr>
  </tbody>

  @endforeach
</table>
{{ $usuario->render() }}
        </div>
        <div class="col-md-6">
            <table class="table table-striped">
  <thead class="thead-dark">
    <tr> <!-- encabezado de tabla -->
               <td colspan="6" class="text-center bg-dark text-white">Empresas Registradas</td> 
            </tr>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Codigo Sigesp</th>
      <th scope="col">Descripción</th>
    </tr>
  </thead>
  @foreach ($organizacion as $orga)

  <tbody>
    <tr>
      <th scope="row">{{ $orga->id }}</th>
      <td>{{ $orga->cod_emp_sigesp }}</td>
      <td>{{ $orga->descripcion_sigesp }}</td>
  
    </tr>
  </tbody>

  @endforeach
</table>
{{ $organizacion->render() }}
        </div>
    </div>
</div>
</section>

<section>
    

<div class="container-fluid">
    <div class="row justify-content-center mt-5 ">
        <div class="col-md-6">
            <table class="table table-striped">
  <thead class="thead-dark">
    <tr> <!-- encabezado de tabla -->
               <td colspan="6" class="text-center bg-dark text-white">Nominas Sincronizadas</td> 
            </tr>
    <tr>
      <th scope="col">Codigo Empresa</th>
      
      <th scope="col">Codigo Nomina</th>
      <th scope="col">Descripción</th>
      
    </tr>
  </thead>
  @foreach ($querynominas as $query)

  <tbody>
    <tr>
      <th scope="row">{{ $query->codemp }}</th>
      <td>{{ $query->codnom }}</td>
      <td>{{ $query->desnom }}</td>
      
    </tr>
  </tbody>

  @endforeach
</table>
{{-- {{ $query->render() }} --}}
        </div>
        <div class="col-md-6">
            <table class="table table-striped">
  <thead class="thead-dark">
    <tr> <!-- encabezado de tabla -->
               <td colspan="6" class="text-center bg-dark text-white">Quincenas Calculadas hasta la Fecha</td> 
            </tr>
    <tr>
      <th scope="col">Fecha Inicio de Periodo</th>
      <th scope="col">Fecha Fin de Periodo</th>
      
    </tr>
  </thead>
  @foreach ($queryperiodos as $q)

  <tbody>
    <tr>
      
      <td>{{ $q->fecdesper }}</td>
      <td>{{ $q->fechasper }}</td>
  
    </tr>
  </tbody>

  @endforeach
</table>
{{-- {{ $q->render() }} --}}
        </div>
    </div>
</div>
</section>


<script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
<script src="{{ asset('js/jquery.slim.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>