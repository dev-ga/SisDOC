<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SisDoc - Fundeeh</title>
	<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/estilos.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('font/all.css') }}" rel="stylesheet" type="text/css">
	
</head>
<body class="registro">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Default form subscription -->
                <form class="text-center border border-light p-4 registroform estilosregistroform">

                    <p class="h4 mb-4">Formulario de Registro</p>

                    

                    <!-- Nombre -->
                    <div class="form-group  mb-2">
                        <label for="nombre" class="titulolabel">Nombre</label>
                    <input type="text" id="nombre" class="form-control estilosinputregistro " placeholder="Nombre Completo" autofocus>
                    </div>

                    <!-- Apellido -->
                    <div class="form-group  mb-2">
                        <label for="apellido" class="titulolabel">Apellido</label>
                    <input type="text" id="apellido" class="form-control estilosinputregistro " placeholder="Apellido">
                    </div>

                    <!-- Cedula -->
                    <div class="form-group  mb-2">
                        <label for="ci" class="titulolabel">Cedula de Identidad</label>
                    <input type="text" id="ci" class="form-control estilosinputregistro " placeholder="Eje: 12345678">
                    </div>

                    <!-- Organizacion -->
                    <div class="form-group  mb-2">
                        <label for="organizacion" class="titulolabel">Organizacion</label>
                    <input type="text" id="organizacion_id" class="form-control estilosinputregistro " placeholder="A que organizacion perteneces?">
                    </div>

                    <!-- email -->
                    <div class="form-group  mb-2">
                        <label for="email" class="titulolabel">e-mail</label>
                    <input type="email" id="email" class="form-control estilosinputregistro " placeholder="@">
                    </div>

                    <!-- password -->
                    <div class="form-group  mb-2">
                        <label for="password" class="titulolabel">Password</label>
                    <input type="password" id="password" class="form-control estilosinputregistro " placeholder="Password">
                    </div>

                                       
                    <!-- Sign in button -->
                    <button class=" estilosbutton btn btn-info btn-block my-5" type="submit">Registrar</button>


                </form>
<!-- Default form subscription -->
            </div>
        </div>
    </div>
<script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
<script src="{{ asset('js/jquery.slim.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>