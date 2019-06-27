<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Usuario;
use App\Pregunta;
use DB;

class ReseteoPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    
    public function index()
    {
        $pregunta = Pregunta::all();
        return view('auth.validacionemail', compact('pregunta'));
    }



    public function validacionpregunta(Request $request)
    {
        
        $cedula = $request->input("cedula");
        $pregunta_id = $request->input("pregunta_id");
        $respuesta = $request->input("respuesta");
        $usuario = Usuario::all()->where('cedula','=',$cedula);

        // Validamos que el usuario este registrado en la base de datos...
        // if ($usuario) {

        //     return view('frontend/404');
        // }

        foreach ($usuario as $key) {
            $pregunta = $key->pregunta_id;
            $respuestac = $key->respuesta;
            if ($pregunta_id = $pregunta and $respuestac == $respuesta ) 
            {
                return view('auth.reseteopassword', compact('usuario'));
            }
            return view('frontend/404');
        }
       

    }

    public function updatepassword(Request $request)
    {
        $validacion = validator::make($request->all(),
            [

                'password'=> 'required|min:6|max:10'

            ]);
    
   
        if ($validacion->fails())
        
        {
            return redirect('/auth/validacion')->withInput()->withErrors($validacion);
        }
              
        $contraseña = bcrypt($request->input("password"));
        $cedula = $request->input("cedula");

        Usuario::where('cedula', $cedula)->update(['password' => $contraseña]);

        // $updatepassword = DB::table('usuarios')->where('cedula', $cedula)->update(['password' => $contraseña]);
        // dd($updatepassword);
        return view('auth.login');

    }

    
}