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
    color: black;
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
    @foreach ($query_cabecera as $query_cabecera)
    @php
        $apellido = $query_cabecera->apeper;
    @endphp
       
    @endforeach
    {{--  calculo del sueldo total  --}}
            @php
            $asignaciones = 0;
            $deducciones = 0;
            $total;
            $sueldo;
            @endphp
            @foreach($query_recibo as $query_recibo)
            @if($query_recibo->valsal > 0)
            @php
            $asignaciones += $query_recibo->valsal;
            $sueldo = $asignaciones*2;
            @endphp
            @endif
            @endforeach
    
    <div class="constancia">
        <p>Quien suscribe, GERENTE (E) DE OFICINA DE GESTIÓN HUMANA de el (la) FUNCACION DE EDIFICACIONES Y EQUIPAMIENTO HOSPITALARIO, hace constarpor medio de la presente que el (la)
            {{--  ciudadano(a): {!! $query_cabecera->apeper !!} {!! $query_cabecera->nomper !!}, titular de la cedula de identidad Nro.: {!! $query_cabecera->cedper !!} sus servicios en esta
            Institución desde el dia {!! $query_cabecera->fecingper !!}, adscrito(a) ha: {!! $query_cabecera->desuniadm !!}, ejerciendo funciones como: {!! $query_cabecera->descar !!},  --}}
            percibiendo una remuneración mensual de: Bolivares Fuertes {{ $sueldo }}. {{ $apellido }}
        </p>
        <p>
            Adicionalmente, percibe el beneficio de la ley de Alimentación para los trabajadores y trabajadoras, por la cantidad de: Bolivares Fuertes 25.000,00.
        </p>
        <p>
            Constancia que se expide a petición de la parte interedasa, en Caracas a los {{ date('d') }} días del mes de {{ date('M') }} del año {{ date('Y') }}.
        </p>
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