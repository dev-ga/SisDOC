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
            {{--  <img src="{{ asset('images/cintillo.png') }}" width="120" height="72" class="d-inline-block align-top" alt="">  --}}
            <img src="{{ asset('images/cintillo.png') }}" class="d-inline-block align-top cintillo" alt="">
        </a>
    </nav>
    <div class="rif text-right">
        <span><em>RIF: G-20009059-6</em></span>
    </div>
    <br>
    <br>
    <br>

    @foreach ($query_cabecera as $query_cabecera)
    @php
        $apellido = $query_cabecera->apeper;
        $nombre = $query_cabecera->nomper;
        $cedula = $query_cabecera->cedper;
        $uniadmin = $query_cabecera->desuniadm;
        $cargo = $query_cabecera->descar;
        $fechaingreso = $query_cabecera->fecingper;

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
    
    
        <div class="titulo text-center">
            <h5><strong>CONSTANCIA DE TRABAJO</strong></h5>
        </div>
        <div class="constancia text-justify">
<br>
<br>


        <p>Quien suscribe, GERENTE (E) DE OFICINA DE GESTIÓN HUMANA de el (la) FUNCACION DE EDIFICACIONES Y EQUIPAMIENTO HOSPITALARIO, hace constarpor medio de la presente que el (la)
        ciudadano(a): <strong> {{ $apellido }} {{ $nombre }}</strong>, titular de la cedula de identidad <strong> Nro.: {{ $cedula }}</strong> sus servicios en esta Institución desde el dia {{ $fechaingreso }}, adscrito(a) ha: {{ $uniadmin }}, ejerciendo funciones como: {{ $cargo }},
        percibiendo una <strong>remuneración mensual de: Bolivares Fuertes {{ number_format($sueldo, 2, ",", ".") }}.</strong></p>
        <p>Adicionalmente, percibe el beneficio de la ley de Alimentación para los trabajadores y trabajadoras, por la cantidad de: Bolivares Fuertes 25.000,00.</p>
        <p>Constancia que se expide a petición de la parte interedasa, en Caracas a los {{ date('d') }} días del mes de {{ date('M') }} del año {{ date('Y') }}.</p>
        
    </div>
    <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        
        <p class="text-center"><strong>Oficina de Gestión Humana</strong></p>

    <div class="footer-constancia text-center">
            <p><em> Esta constancia ha sido impresa electronicamente, los datos reflejados están sujetos a confirmaciona travéz del siguiente número
                    de teléfono: <strong>0212-4082820</strong>. Valido por tres (3 meses).</em></p>
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