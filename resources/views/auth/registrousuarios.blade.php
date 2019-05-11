<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SisDoc - Fundeeh</title>
	<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" >
	<link href="{{ asset('css/estilos.css') }}" rel="stylesheet" type="text/css" >
	
</head>
<body>

	<div id="login-button">
  <img src="https://dqcgrsy5v35b9.cloudfront.net/cruiseplanner/assets/img/icons/login-w-icon.png">
  </img>

  <div class="modal-dialog text-center">
    <div class="col-sm-9 main-section">
      <div class="modal-content">

        <div class="col-12 user-img">
          <img src="img/face.png">
        </div>

        <div class="col-12 form-input">
          <form>
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Enter Password">
            </div>
            <button type="submit" class="btn btn-success">Login</button>
          </form>
        </div>

        <div class="col-12 forgot">
          <a href="#">Forgot Password?</a>
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