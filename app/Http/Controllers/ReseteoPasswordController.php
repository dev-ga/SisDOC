<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Usuario;
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
        return view('auth.validacionemail');
    }



    public function validacionemail(Request $request)
    {
        $email = $request->input("email");
        // dd($email);
        
       $users = DB::table('usuarios')->where('email', '=', $email)->get();
       // dd($users);
       
       foreach ($users as $key) 
       {
            $result = $key->email;
     
            if ($result == $email)
            {
                $usuario = DB::table('usuarios')->where('email', '=', $email)->get();
                // dd($usuario);
                return view('auth.reseteopassword')->with('usuario', $usuario);
            }
            
       }

       return view('frontend/404');


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