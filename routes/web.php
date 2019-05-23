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

// Route::get('/', function () {
//   return view('welcome');
// });



//Grupo de rutas login de usuarios

	//Route::get('auth/login', 'AuthController@showLogin') -> name('auth.login');
	Route::get('/', 'AuthController@showLogin') -> name('auth.login')->middleware('guest'); //ruta raiz del sistemas SISDOC ----> El milddleware('guest') es para que muestre esta ruta a usuarios que NO ESTAN LOGUEADOS..

	Route::post('auth/login', 'AuthController@validateLogin') -> name('authvalidate.login');
	
	Route::post('auth/logout', 'AuthController@logout') -> name('auth.logout');

	Route::get('dashboard', 'DashboardController@index') -> name('dashboard');





// Registration Routes...

	route::get('auth/registrousuarios', 'RegistroController@showRegistroForm')->name('auth.registrousuarios');

	route::post('auth/registro', 'RegistroController@registrousuario')->name('authvalidate.registro');;


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
//
//
//
//
Route::get('prueba', 'AuthController@pruebasigesp');

Route::get('prueba2', function()
{
	$query1 = "SELECT sno_concepto.codconc, sno_concepto.titcon as nomcon,  sno_salida.valsal , sno_salida.tipsal, 
abs(sno_conceptopersonal.acuemp) /**abs -> valor absoluto **/ AS acuemp,
abs(sno_conceptopersonal.acupat) AS acupat,
sno_concepto.repacucon,
sno_concepto.repconsunicon,
sno_concepto.consunicon,
sno_concepto.persalnor,
sno_concepto.recpagadi, 
		
(SELECT moncon FROM sno_constantepersonal 		  
WHERE sno_concepto.repconsunicon='1' 			
AND sno_constantepersonal.codper = '0016007868' 			
AND sno_constantepersonal.codemp = sno_concepto.codemp 			
AND sno_constantepersonal.codnom = sno_concepto.codnom 			
AND sno_constantepersonal.codcons = sno_concepto.consunicon ) AS unidad
   
FROM sno_salida, sno_concepto, sno_conceptopersonal  

WHERE sno_salida.codemp='0001'    
AND sno_salida.codnom='0001'    AND sno_salida.codperi='008'   
AND sno_salida.codper='0016007868'      
AND sno_salida.valsal<>0  
AND (sno_salida.tipsal='A' 
OR sno_salida.tipsal='V1' 
OR sno_salida.tipsal='W1' 
OR sno_salida.tipsal='D' 
OR sno_salida.tipsal='V2' 
OR sno_salida.tipsal='W2' 
OR sno_salida.tipsal='P1' 
OR sno_salida.tipsal='V3' 
OR sno_salida.tipsal='W3')   
AND sno_salida.codemp = sno_concepto.codemp    
AND sno_salida.codnom = sno_concepto.codnom    
AND sno_salida.codconc = sno_concepto.codconc    
AND sno_salida.codemp = sno_conceptopersonal.codemp    
AND sno_salida.codnom = sno_conceptopersonal.codnom    
AND sno_salida.codconc = sno_conceptopersonal.codconc    
AND sno_salida.codper = sno_conceptopersonal.codper  

ORDER BY sno_concepto.codconc, sno_salida.tipsal";

$codper = '0016007868';
$query2 = "select * from sno_personal where codper = '$codper'";
	/*$u = DB::connection('sigesp')->select('select * from sno_nomina');*/
	$u = DB::connection('sigesp')->select($query2);
        dd ($u);
});

Route::get('frontend/recibo', 'ReciboController@index') -> name('recibo.form');






