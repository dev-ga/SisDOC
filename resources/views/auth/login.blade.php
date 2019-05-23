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
<div class="container h-100">
    <div class="row align-items-center h-100">
        <div class="col-md-4 mx-auto">
            <div class="card">
                <img class="card-img-top img-fluid login-icon" src="http://chittagongit.com/download/226043" alt="Card image cap">
                <div class="card-body ">
                    <h4 class="card-title text-center">Login</h4>
                    <form class="" method="POST" action="{{ route('authvalidate.login') }}">
                        @csrf {{-- Para mostrar los errores si enviamos en formulario vasio --}}
                        <div class="form-group">
                            <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control form-control-login " placeholder="E-mail">
                            {!! $errors->first ('email', '<span class="badge badge-danger">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control form-control-login" placeholder="Password">
                            {!! $errors->first ('password', '<span class="badge badge-danger">:message</span>' ) !!}
                        </div>
                        <!-- Sign in button -->
                    <button class="btn btn-info btn-block my-2" type="submit">Entrar</button>

                    <!-- Register -->
                    <p class="texto">No estas Resgistrado?<a href="{{ route('auth.registrousuarios') }}">  Registro</a></p>
                    </form>
                  </div>
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