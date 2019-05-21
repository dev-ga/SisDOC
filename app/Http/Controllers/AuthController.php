<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Usuario;
//agregadas al controlador para utilizar medotod de validacion
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;




class AuthController extends Controller
{

    protected function showLogin()
    {
    	return view('auth.login');
    }

    protected function validateLogin(Request $request)
    {
    	$credenciales = $request->only('email', 'password');


    	if (Auth::attempt($credenciales)) 
    	{
            // Autenticación aprobada...
            /*return redirect()->intended('frontend/index');*/
            
            return  dd($credenciales);
        }
        else
        {
            return 'fallo login';
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
