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
<body class="pdf">
    @foreach ($query_cabecera as $query_cabecera)

<p>Cedula de Identidad: {!! $query_cabecera->cedper !!}</p>
<p>Cedula de Identidad: {!! $query_cabecera->codcueban !!}</p>

@endforeach
    <div class="panel panel-default">
            <table class="table table-sm">
                    <thead class="text-center">
                        <tr>
                            <th scope="col"> <img src="{{ asset('/images/logo_fundeeh.png') }}" alt="logo"></th>
                            <th scope="col"><h4>Fundacion De Estructura y Edificaciones Hospitalarias</h4></th>
                        </tr>
                    </thead>
            </table>
    </div>
       



<div class="panel panel-default">
            <table class="table table-bordered table-sm">
                    <thead class="thead-dark text-center">
                        <tr>
                            
                            <td scope="col">Nombre Y Apellido</td>
                            <td scope="col">Cedula de Identidad</td>
                            <td scope="col">Fecha de Ingreso</td>
                            <td scope="col">Cargo</th>
                            <th scope="col">Horario</th>

                            
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                                
                                <td>{{ auth()->user()->nombre }} {{ auth()->user()->apellido }}</td>
                                
                                    {{-- @foreach ($infopdf2 as $infopdf2)
                                        <td class="text-center" >{!! $infopdf2->cedper !!}</td>
                                        <td class="text-center" >{!! $infopdf2->fecingper !!}</td>
                                        <td class="text-center" >{!! $infopdf2->carantper !!}</td>
                                        <td class="text-center" >{!! $infopdf2->horper !!}</td>
                                    @endforeach --}}
                                {{-- <td>{{ date('d-m-Y') }}</td> --}}
                                
                                
                    </tbody>
                </table>
     
        </div>

        <div class="panel panel-default">
            
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

                        @foreach($query_recibo as $query_recibo)

                            @if($query_recibo->valsal > 0)
                                @php
                                    $asignaciones += $query_recibo->valsal;
                                @endphp
                                    <tr>
                                        <td >{!! ucfirst(strtolower($query_recibo->nomcon)) !!}</td>
                                        <td class="text-center" >{!! $query_recibo->valsal !!}</td>
                                        <td >  </td>
                                    </tr>
                            @endif
                            @if($query_recibo->valsal < 0)
                                @php
                                    $deducciones += $query_recibo->valsal;
                                @endphp
                                    <tr>
                                        <td>{!! ucfirst(strtolower($query_recibo->nomcon)) !!}</td>
                                        <td>   </td>
                                        <td class="text-center"> {!! $query_recibo->valsal !!}</td>
                                    </tr>
                            @endif
                        @endforeach
                        <tr>
                            <td scope="col">Total Asignaciones</td>
                            <td class="text-center prueba1" scope="col">{{ $asignaciones }}</td>
                            <td>  </td>
                            
                        </tr>
                        <tr>
                            <td scope="col">Total Deducciones</td>
                            <td>  </td>
                            <td class="text-center prueba1" scope="col">{{ $deducciones }}</td>
                            
                            
                        </tr>
                        <tr>
                            <th class="text-center prueba1" scope="col">NETO A COBRAR</th>
                            <td class="text-center prueba1">  </td>
                            <th class="text-center prueba1" scope="col">{{ $total = $asignaciones + $deducciones }}</th>
                            
                            
                        </tr>

                    </tbody>
                </table>
                
     
        </div>
    </div>
<script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
<script src="{{ asset('js/jquery.slim.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>