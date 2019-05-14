<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SisDoc - Fundeeh</title>
<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('css/estilos.css') }}" rel="stylesheet" type="text/css" >
</head>
<body class="login">
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <!-- Default form login -->
                <form class="estilosform text-center border-light p-4 loginform" method="POST" action="{{ route('authvalidate.login') }}">

                    <p class="h4 mb-4">Login</p>

                    <!-- Email -->
                    <label for="usuario" class="titulolabel">Usuario</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control estilosinput @error('password') is-invalid @enderror mb-4" placeholder="E-mail" required autocomplete="email" autofocus>

                    <!-- Password -->
                    <label for="password" class="titulolabel">Password</label>
                    <input id="password" type="password" class="form-control estilosinput @error('password') is-invalid @enderror mb-5" name="password" placeholder="Password" required autocomplete="current-password">

                    <!-- Sign in button -->
                    <button class="estilosbutton btn btn-info btn-block my-4" type="submit">Entrar</button>

                    <!-- Register -->
                    <p>No estas Resgistrado?<a href="{{ route('auth.registrousuarios') }}">  Registro</a></p>
    
                </form>
            </div>
        </div>
    </div>
<script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
<script src="{{ asset('js/jquery.slim.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>