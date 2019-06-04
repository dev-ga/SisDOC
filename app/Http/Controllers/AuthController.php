<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Usuario;
//agregadas al controlador para utilizar medotod de validacion
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Http\Controllers\AuthController;

use Illuminate\Support\Facades\DB;




class AuthController extends Controller
{

    // protected function __construct()
    // {
    //     $this->middleware('guest', ['only' => 'Showlogin']);
    // }

    protected function showLogin()
    {
    	return view('auth.login');
    }

    protected function validateLogin(Request $request)
    {
    	
        $credenciales = $this->validate(request(), [

            'cedula' => 'required|max:10',
             // 'email'     => 'email|required|string',
             'password'  => 'required|string|min:6|max:10'

        ]); 


    	if (Auth::attempt($credenciales)) 
    	{
            // Autenticación aprobada...
            /*return redirect()->intended('frontend/index');*/
            
            // return  dd($credenciales);
            return redirect()->route('dashboard');
        }
        else
        {
            // return  back()->withErrors(['email' => 'El usuario no se encuentra registrado en el sistema']);
            return  back()
                // ->withErrors(['email' => trans('auth.failed')]) //para enviar los errores de validacion a la vista
                // ->withInput(request(['email'])); //para enviar los input a la vista para que se muestren con las funcion old()

                ->withErrors(['cedula' => trans('auth.failed')]) //para enviar los errores de validacion a la vista
                ->withInput(request(['cedula'])); //para enviar los input a la vista para que se muestren con las funcion old()
        }


    }

    protected function logout()
    {
    	// Cerramos la sesión
        Auth::logout();

        // Volvemos al login y mostramos un mensaje indicando que se cerró la sesión
        return redirect('/');
        
    }

}
