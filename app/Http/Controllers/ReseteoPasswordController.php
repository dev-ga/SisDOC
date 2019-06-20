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



    public function validacionemail(Request $request)
    {
        

        $pregunta_id = $request->input("pregunta_id");
        $respuesta = $request->input("respuesta");

        dd($pregunta_id, $respuesta);
        
        
        
        
        
    //     $email = $request->input("email");
    //     // dd($email);
        
    //    $users = DB::table('usuarios')->where('email', '=', $email)->get();
    //    // dd($users);
       
    //    foreach ($users as $key) 
    //    {
    //         $result = $key->email;
     
    //         if ($result == $email)
    //         {
    //             $usuario = DB::table('usuarios')->where('email', '=', $email)->get();
    //             // dd($usuario);
    //             return view('auth.reseteopassword')->with('usuario', $usuario);
    //         }
            
    //    }

    //    return view('frontend/404');


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
        $email = $request->input("email");
        $updatepassword = DB::table('usuarios')->where('email', $email)->update(['password' => $contraseña]);
        
        return view('auth.login');

    }

    
}