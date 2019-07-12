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
| Rutas para el Reseteo de Password
|--------------------------------------------------------------------------
|
*/

Route::get('auth/validacionemail', 'ReseteoPasswordController@index') -> name('validacion.email');


// ruta paa validar que el email introducido sea en registrado en la base de datos

Route::post('auth/validacion', 'ReseteoPasswordController@validacionpregunta') -> name('validacion');  

Route::get('auth/reseteopassword', 'ReseteoPasswordController@registroform')->name('reseteopassword');

Route::post('auth/update', 'ReseteoPasswordController@updatepassword')->name('update');

/*Route::get('auth/reseteopassword', 'RegistroController@index')->name('reseteopassword');
*/




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
| Rutas para administración
|--------------------------------------------------------------------------
|
*/


Route::get('listar-usuarios', 'AdminController@listausuarios') -> name('listar-usuarios');

Route::get('listar-empresas', 'AdminController@listaempresas') -> name('listar-empresas');

Route::get('listar-nominas', 'AdminController@listanominas') -> name('listar-nominas');


Route::get('editarusuario/{id}', 'AdminController@editarusuario') -> name('editarusuario');

Route::post('actualizarusuario/{id}', 'AdminController@actualizausuario')->name('actualizarusuario');

Route::get('eliminarusuario/{id}', 'AdminController@eliminarusuario') -> name('eliminarusuario');

Route::get('actualizarol/{id}', 'AdminController@actualizarol') -> name('actualizarol');

Route::post('actualizaroles', 'AdminController@actualizaroles') -> name('actualizaroles');

Route::get('prueba', function () {
    return view('registro');
    });


/*
|--------------------------------------------------------------------------
| Rutas Constancia de trabajo
|--------------------------------------------------------------------------
|
*/

Route::get('generarsolicitud', 'ConstanciaController@solicitudform') -> name('solicitudform');

Route::post('generarsolicitud', 'ConstanciaController@procesarsolicitud') -> name('procesarsolicitud');

Route::get('listarsolicitudes', 'ConstanciaController@listarsolicitudes') -> name('listarsolicitudes');

Route::get('missolicitudes', 'ConstanciaController@missolicitudes') -> name('missolicitudes');

Route::get('actualizarestatus/{id}', 'ConstanciaController@actualizarestatus') -> name('actualizarestatus');

Route::get('validardatacostancia/{usuario_id}', 'ConstanciaController@validardatacostancia') -> name('validardatacostancia');

Route::get('validainfocostancia', 'ConstanciaController@validainfocostancia') -> name('validainfocostancia');

Route::post('costanciapdf', 'ConstanciaController@costanciapdf') -> name('costanciapdf');

Route::get('costanciapdf', function() {

    $pdf = App::make('dompdf.wrapper');

    $pdf->loadView('costanciapdfglobal');
    
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
Route::get('conexiondb', function() {

    try { DB::connection()->getPdo();
    } 
    catch (\Exception $e) {

        dd($e->getcode());
        
        }
Route::get('admin', 'AdminController@totalusuarios',function () {
    return view('admin/admin');
    });
Route::get('actualiza', 'AdminController@actualizausuario') -> name('actualiza');
Route::get('eliminarusuario/{id}', 'AdminController@eliminarusuario') -> name('eliminarusuario');
Route::get('exception/index', 'ExceptionController@index');




    






