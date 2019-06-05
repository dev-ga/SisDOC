<?php

/*
|--------------------------------------------------------------------------
| Rutas S!SDOC
|--------------------------------------------------------------------------
|
*/


/*
|--------------------------------------------------------------------------
| Rutas para el Login de Usuarios
|--------------------------------------------------------------------------
|
*/
	
	Route::get('/', 'AuthController@showLogin') -> name('auth.login')->middleware('guest'); 
    /*ruta raiz del sistemas SISDOC ----> El milddleware('guest') es para que muestre esta ruta a usuarios que NO ESTAN LOGUEADOS..*/


	Route::post('auth/login', 'AuthController@validateLogin') -> name('authvalidate.login');
	
	Route::post('auth/logout', 'AuthController@logout') -> name('auth.logout');

	


/*
|--------------------------------------------------------------------------
| Rutas para el Registro de Usuarios
|--------------------------------------------------------------------------
|
*/


	Route::get('auth/registrousuarios', 'RegistroController@showRegistroForm')->name('auth.registrousuarios');

	Route::post('auth/registro', 'RegistroController@registrousuario')->name('authvalidate.registro');

    Route::get('registroOK', function () {
    return view('registroOK');
    });




/*
|--------------------------------------------------------------------------
| Ruta DASHBOARD
|--------------------------------------------------------------------------
|
*/

    Route::get('dashboard', 'DashboardController@index') -> name('dashboard');


/*
|--------------------------------------------------------------------------
| Rutas para manejar la informacion y renderisar el PDF
|--------------------------------------------------------------------------
|
*/

    Route::get('frontend/recibo', 'ReciboController@index') -> name('recibo.form');

    Route::post('reciboPDF', 'ReciboController@pdf') -> name('reciboPDF');

    Route::get('pdf', function() {

        $pdf = App::make('dompdf.wrapper');

        $pdf->loadView('pdf');
        
        return $pdf->stream();

    });

    Route::post('pruebapdf', 'ReciboController@pdf') -> name('pruebapdf');

/*
|--------------------------------------------------------------------------
| Rutas para manejar la informacion y renderisar el ARC
|--------------------------------------------------------------------------
|
*/

    Route::get('frontend/arcform', 'ArcController@index') -> name('arc.form');

    Route::post('planillaARC', 'ArcController@arc') -> name('planillaARC');

    Route::get('frontend/arc', function() {

        $pdf = App::make('dompdf.wrapper');

        $pdf->loadView('frontend.arc');
        
        return $pdf->stream();

    });


/*
|--------------------------------------------------------------------------
| Rutas para pruebas varias
|--------------------------------------------------------------------------
|
*/


    Route::get('prueba', function () {
    return view('prueba');
    });







    






