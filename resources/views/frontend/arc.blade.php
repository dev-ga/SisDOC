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

<style type="text/css" media="screen">

.fecha
{
   text-align:right;
   font-weight: bold;
   margin-bottom: 2px;
   font-size: 0.7rem;
}

.list-group-item-estilo
{
 /* position: relative;*/
    display: block;
    padding: -0.22rem 0rem;
    margin-bottom: 3px;
    background-color: #fff;
}

.list-group-item-estilo li
{
    line-height: 1.2;
}

.datos-trabajador
{
    font-size: 0.7rem;
}

.tabla
{
    font-size: 0.7rem;
}

.table-sm th, .table-sm td
{
    padding: 0.1rem;
}

.table
{
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
    line-height: 1.1;
}

.navbar-pdf
{
    padding: 0.5rem 0rem;
}

.footer {
   position:fixed;
   left:0px;
   bottom:60px;
  
   width:100%;
   
}

.footer a{
    font-size: 0.7rem;
}

hr
{
    margin-top: 0.5rem;
    margin-bottom: 0.1rem;
    border: 0;
        border-top-width: 0px;
        border-top-style: none;
        border-top-color: currentcolor;
    border-top: 1px solid rgba(0, 0, 0, 0.1);
}

.sisdoc
{
    color: #cbcbcb !important;
}

</style>
</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-pdf">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/logopdf.png') }}" width="120" height="72" class="d-inline-block align-top" alt="">
        </a>
    </nav>
    <div class="fecha">
        <span><em>Fecha de Emision: {{ date('d-M-Y') }}</em>
        </span>
    </div>
    @foreach ($query_infotrabajador as $query_infotrabajador)
        <div class="datos-trabajador mt-1 mb-2">

            <li class="list-group-item-estilo "><strong>Datos Personales</strong></li>
            <hr>
            <li class="list-group-item-estilo"><strong>Nombre y Apellido:</strong> <em>{!! $query_infotrabajador->apeper !!}, {!! $query_infotrabajador->nomper !!}</em></li>
            <li class="list-group-item-estilo"><strong>Cedula:</strong> <em>{!! $query_infotrabajador->cedper !!}</em></li>
            <li class="list-group-item-estilo"><strong>Fecha de Ingreso:</strong> <em>{!! $query_infotrabajador->fecingper !!}</em></li>
            <li class="list-group-item-estilo"><strong>Cargo:</strong> <em>{!! $query_infotrabajador->carantper !!}</em></li>
            
            <hr>
        </div>
    @endforeach
    <div class="panel panel-default tabla">
        <table class="table table-bordered table-sm">
        <thead class="thead-dark text-center">
            <tr>
                <th scope="col">Mes</th>
                <th scope="col">Cedula de Identidad</th>
                <th scope="col">Año en Cuerso</th>
                <th scope="col">ARC</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($query_arc as $query_arc)
                <tr>
                <td class="text-center" >{!!($query_arc->codisr)!!}</td>
                <td class="text-center" >{!!($query_arc->codper)!!}</td>
                <td class="text-center" >{!! $query_arc->anocur !!}</td>
                <td class="text-center" >{!! $query_arc->arc !!}</td>
            </tr>
            @endforeach
             
            
        </tbody>
        </table>
    </div>
  
        <footer class="page-footer font-small footer">

          <!-- Copyright -->
          <div class="footer-copyright text-center py-3 footer-fuente">
            <a><em>Dirección: Av. Baralt, Edif. Centro Simón Bolívar, Torre Sur. Caracas, Area Metropolitana CCS.</em></a>
            <a><em>Telefono: (212) 408-00-00 </em></a>
            <hr>
            <a class="sisdoc"><em>Sisdoc-{{ date('d-M-Y') }}-Fundeeh</em></a>
          </div>
        </footer>
</div>
<script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
<script src="{{ asset('js/jquery.slim.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>