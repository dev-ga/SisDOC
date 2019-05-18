<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SisDoc - Fundeeh</title>
<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" >
<link href="{{ asset('css/estilos.css') }}" rel="stylesheet" type="text/css" >



<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    
</head>
<body>

    
    <div class="contenedor">


        
        <div class="contenedor-login">

            <div class="row justify-content-center">
                <div class="col-md-3">

                    
                    <form class="text-center" method="POST" action="{{ route('authvalidate.login') }}">
                @csrf
                <div class="titulo">
                    <p class="h4 mb-4 titulo">Login</p>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control estilosinput @error('password') is-invalid @enderror mb-2 " placeholder="E-mail" required autocomplete="email" autofocus >

                    </div>

                    <!-- Password -->
                    <div class="form-group">
                    <input id="password" type="password" class="form-control estilosinput @error('password') is-invalid @enderror mb-2" name="password" placeholder="Password" required autocomplete="current-password">
                    </div>

                    <!-- Sign in button -->
                    <button class="estilosbutton btn btn-info btn-block my-2" type="submit">Entrar</button>

                    <!-- Register -->
                    <p>No estas Resgistrado?<a href="{{ route('auth.registrousuarios') }}">  Registro</a></p>
    
                </form>

                </div>
            </div>
            
        </div>
        
            
        
    </div>
    
<script src="{{ asset('js/jquery-3.4.1.js') }}"></script>
<script src="{{ asset('js/jquery.slim.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>