<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
//agregadas al controlador para utilizar medotod de validacion
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Routing\Redirector; // -> redirect()
use Illuminate\Validation\Factory; // -> validator()

class AuthController extends Controller
{
    //
    //
    protected function registrousuario(Request $request)
    {
    	$validacion = validator::make($request->all(),
    		[
    			'nombre' => 'require|max:50',
    			'apellido' => 'require|max:50',
    			'ci' => 'require|max:10',
    			'email' => 'email|unique:usuarios',
    			'password'=> 'require|min:6|max:8'

    		]);
    	if ($validacion->fail())
    	{
    		return redirect('/frontend/registrousuarios')->withInput()->withErrors($validacion);
    	}

    	$usuarios = array(
    		
    		'nombre' => $request->nombre,
    		'apellido' => $request->apellido,
    		'ci' => $request->ci,
    		'email' => $request->email,
    		'password' => bcrypt($request->password)
    		//'password' => Hash::make($request->newPassword) -> debo probar esta linea para ver como se comporta...
    		);

    	Usuario::create($usuarios);

    	return "usuario creado con exito";

    }

    protected function showLogin()
    {
    	return view('auth.login');
    }

    protected function validateLogin(Request $request)
    {
    	$credenciales = $request->only('email', 'password');

    	if (Auth::attempt($credentials)) 
    	{
            // Autenticación aprobada...
            return redirect()->intended('frontend/index');
        }
    }

    protected function logout()
    {
    	// Cerramos la sesión
        Auth::logout();

        // Volvemos al login y mostramos un mensaje indicando que se cerró la sesión
        return Redirect::to('login')->with('error_message', 'Logged out correctly');
        
    }
}
