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
.firma{
    display: inline-block;
    border-top: 2px solid black;
    margin-top: 25%;
    margin-left: 38%;


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
        <span><em>Fecha de Emision: {{ date('d-M-Y') }}</em></span>
    </div>
    <div class="fecha">
        
        @foreach ($prueba2020 as $prueba2020)
        
            <span><em>Periodo de Nomina: {!! $prueba2020->fecdesper !!} / {!! $prueba2020->fechasper !!}</em></span>

        
            
        @endforeach
    
    </div>
    @foreach ($result as $result)
        <div class="datos-trabajador mt-1 mb-2">

            <li class="list-group-item-estilo "><strong>Datos Personales</strong></li>
            <hr>
            <li class="list-group-item-estilo"><strong>Nombre y Apellido:</strong> <em>{!! $result->apeper !!}, {!! $result->nomper !!}</em></li>
            <li class="list-group-item-estilo"><strong>Cedula:</strong> <em>{!! $result->cedper !!}</em></li>
            <li class="list-group-item-estilo"><strong>Fecha de Ingreso:</strong> <em>{!! $result->fecingper !!}</em></li>
            <li class="list-group-item-estilo"><strong>Departamento:</strong> <em>{!! $result->desuniadm !!}</em></li>
            <li class="list-group-item-estilo"><strong>Cargo:</strong> <em>{!! $result->descar !!}</em></li>
            <li class="list-group-item-estilo"><strong>Salario:</strong> <em>{!! number_format($result->sueintper, 2, ",", ".") !!}</em></li>
            <li class="list-group-item-estilo"><strong>Número de Cuenta:</strong> <em>{!! $result->codcueban !!}</em></li>
            <hr>
        </div>
    @endforeach
    <div class="panel panel-default tabla">
        <table class="table table-bordered table-sm">
        <thead class="thead-dark text-center">
            <tr>
                <th scope="col">Conceptos</th>
                <th scope="col">Asignaciones</th>
                <th scope="col">Deducciones</th>
            </tr>
        </thead>
        <tbody>
            @php
            $asignaciones = 0;
            $deducciones = 0;
            $total;
            @endphp
            @foreach($result2 as $result2)
            @if($result2->valsal > 0)
            @php
            $asignaciones += $result2->valsal;
            @endphp
            <tr>
                <td >{!! ucfirst(strtolower($result2->nomcon)) !!}</td>
                <td class="text-center" >{!! number_format($result2->valsal, 2, ",", ".") !!}</td>
                <td >  </td>
            </tr>
            @endif
            @if($result2->valsal < 0)
            @php
            $deducciones += $result2->valsal;
            @endphp
            <tr>
                <td>{!! ucfirst(strtolower($result2->nomcon)) !!}</td>
                <td>   </td>
                <td class="text-center"> {!! number_format($result2->valsal, 2, ",", ".") !!}</td>
            </tr>
            @endif
            @endforeach
            <tr>
                <td scope="col" class="text-right"><strong>Total Asignaciones:</strong></td>
                <td class="text-center prueba1" scope="col"><strong>{{ number_format($asignaciones, 2, ",", ".") }}</strong></td>
                <td>  </td>
            </tr>
            <tr>
                <td scope="col" class="text-right"><strong>Total Deducciones:</strong></td>
                <td>  </td>
                <td class="text-center prueba1" scope="col"><strong>{{ number_format($deducciones, 2, ",", ".") }}</strong></td>
            </tr>
            <tr>
                <th class="text-right prueba1" scope="col">NETO A COBRAR:</th>
                <td class="text-center prueba1">  </td>
                {{ $total = $asignaciones + $deducciones }}
                <th class="text-center prueba1" scope="col">{{ number_format($total, 2, ",", ".") }}</th>
            </tr>
        </tbody>
        </table>
    </div>

        {{-- Firma del PDF --}}

        <div class="firma">
        <p>Oficina de Gestión Humana</p>
        {{-- <p>Fundación De Estructura y Edificaciones Hospitalarias</p>
        <p>FUNDEEH</p> --}}
        </div>

        {{-- FIN de la Firma del PDF --}}

        <footer class="page-footer font-small footer">

          <!-- Copyright -->
          <div class="footer-copyright text-center py-3 footer-fuente sisdoc">
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