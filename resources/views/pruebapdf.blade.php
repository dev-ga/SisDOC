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
    
<div class="container col-md-8 col-md-offset-2">



<div class="panel panel-default">
            
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>logo</th>
                            <th>Nombre Y Apellido</th>
                            <th>Cedula de Identidad</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                                <td><img src="{{ asset('/images/logo_fundeeh.png') }}" alt="logo"></td>
                                <td>{{ auth()->user()->nombre }} {{ auth()->user()->apellido }}</td>
                                <td>{{ auth()->user()->cedula }}</td>
                                
                                
                    </tbody>
                </table>
     
        </div>

        <div class="panel panel-default">
            
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Conceptos</th>
                            <th>Asignaciones</th>
                            <th>Deducciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $asignaciones =0;
                        @endphp
                        @foreach($infopdf as $infopdf)
                            @if($infopdf->valsal > 0)
                                {{-- @php
                                $total = 0;
                                $suma = 0;
                                $total += $infopdf->valsal;
                                $suma = $total;
                                @endphp --}}
                                @php
                                    $asignaciones += $infopdf->valsal;
                                @endphp
                                <tr>
                                <td>{!! $infopdf->nomcon !!}</td>
                                <td>{!! $infopdf->valsal !!}</td>
                                <td>  </td>
                                </tr>
                                @endif
                                @if($infopdf->valsal < 0)
                                <tr>
                                <td>{!! $infopdf->nomcon !!}</td>
                                <td>   </td>
                                <td>{!! $infopdf->valsal !!}</td>
                                </tr>
                                @endif
                                
                        @endforeach
                    </tbody>
                </table>
     {{ $asignaciones }}
        </div>
    </div>
<script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
<script src="{{ asset('js/jquery.slim.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>