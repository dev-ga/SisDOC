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

             'email'     => 'email|required|string',
             'password'  => 'required|string|min:6|max:8'

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
                ->withErrors(['email' => trans('auth.failed')]) //para enviar los errores de validacion a la vista
                ->withInput(request(['email'])); //para enviar los input a la vista para que se muestren con las funcion old()
        }


    }

    protected function logout()
    {
    	// Cerramos la sesión
        Auth::logout();

        // Volvemos al login y mostramos un mensaje indicando que se cerró la sesión
        return redirect('/');
        
    }





    public function pruebasigesp()
    {

        $u = DB::connection('sigesp')->select('SELECT sno_concepto.codconc, sno_concepto.titcon as nomcon,  sno_salida.valsal , sno_salida.tipsal, 
abs(sno_conceptopersonal.acuemp) /**abs -> valor absoluto **/ AS acuemp,
abs(sno_conceptopersonal.acupat) AS acupat,
sno_concepto.repacucon,
sno_concepto.repconsunicon,
sno_concepto.consunicon,
sno_concepto.persalnor,
sno_concepto.recpagadi, 
        
(SELECT moncon FROM sno_constantepersonal         
WHERE sno_concepto.repconsunicon=1            
AND sno_constantepersonal.codper = 0016007868             
AND sno_constantepersonal.codemp = sno_concepto.codemp          
AND sno_constantepersonal.codnom = sno_concepto.codnom          
AND sno_constantepersonal.codcons = sno_concepto.consunicon ) AS unidad
   
FROM sno_salida, sno_concepto, sno_conceptopersonal  

WHERE sno_salida.codemp=0001    
AND sno_salida.codnom=0001    AND sno_salida.codperi=008   
AND sno_salida.codper=0016007868      
AND sno_salida.valsal<>0  
AND (sno_salida.tipsal=A 
OR sno_salida.tipsal=V1 
OR sno_salida.tipsal=W1 
OR sno_salida.tipsal=D 
OR sno_salida.tipsal=V2 
OR sno_salida.tipsal=W2 
OR sno_salida.tipsal=P1 
OR sno_salida.tipsal=V3 
OR sno_salida.tipsal=W3)   
AND sno_salida.codemp = sno_concepto.codemp    
AND sno_salida.codnom = sno_concepto.codnom    
AND sno_salida.codconc = sno_concepto.codconc    
AND sno_salida.codemp = sno_conceptopersonal.codemp    
AND sno_salida.codnom = sno_conceptopersonal.codnom    
AND sno_salida.codconc = sno_conceptopersonal.codconc    
AND sno_salida.codper = sno_conceptopersonal.codper  

ORDER BY sno_concepto.codconc, sno_salida.tipsal ');
        dd ($u);
    }
}
