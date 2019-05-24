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

	Route::post('auth/registro', 'RegistroController@registrousuario')->name('authvalidate.registro');;


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

    Route::get('pruebapdf', function() {

        $pdf = App::make('dompdf.wrapper');

        $pdf->loadHTML('<h1>Test</h1>');
        
        return $pdf->stream();

    });

    Route::get('pruebadequery', function() {

        return view('pruebapdf');
    
    });








    






