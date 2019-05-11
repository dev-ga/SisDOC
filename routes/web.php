<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});




//Grupo de rutas login de usuarios

	Route::get('auth/login', 'AuthController@showLogin') -> name('auth.login');

	Route::post('auth/login', 'AuthController@validateLogin') -> name('authvalidate.login');
	
	Route::get('auth/logout', 'AuthController@logOut') -> name('auth.logout');





// Registration Routes...

	route::get('auth/registrousuarios', 'RegistroController@showRegistroForm')->name('auth.registrousuarios');

	route::post('register', 'Auth\RegisterController@register');


/*Llamadas al controlador Auth*/
//Route::get('login', 'AuthController@showLogin'); // Mostrar login
//Route::post('login', 'AuthController@postLogin'); // Verificar datos
//Route::get('logout', 'AuthController@logOut'); // Finalizar sesión
 
/*Rutas privadas solo para usuarios autenticados*/

//Route::group(['before' => 'auth'], function()
//{
//    Route::get('/', 'HomeController@showWelcome'); // Vista de inicio

//});

//Grupos de rutas para la parte del login de usuarios...

