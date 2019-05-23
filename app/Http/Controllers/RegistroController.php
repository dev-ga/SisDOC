<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Organizacion;
use App\Usuario;



class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function showRegistroForm()
    {

        $organizacion = Organizacion::all();
        
        return view('auth.registrousuarios', compact('organizacion'));
        
    }

    protected function registrousuario(Request $request)
    /*protected function registrousuario(RegristoUsuarios $request)*/


    {

        /*dd($request);*/

        

    
        $validacion = validator::make($request->all(),
            [
                'nombre' => 'required|max:50',
                'apellido' => 'required|max:50',
                'cedula' => 'required|max:10',
                'organizacion_id' => 'required|max:1',
                'email' => 'email|unique:usuarios',
                'password'=> 'required|min:6|max:8'

            ]);
    
   
        if ($validacion->fails())
        
        {
            return redirect('/auth/registrousuarios')->withInput()->withErrors($validacion);
        }
      

        $usuarios = array(
            
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'cedula' => '00'.$request->cedula,
            'organizacion_id' => $request->organizacion_id,
            'email' => $request->email,
            'password' => bcrypt($request->password)
            //'password' => Hash::make($request->newPassword) -> debo probar esta linea para ver como se comporta...
            );

        Usuario::create($usuarios);

        return "usuario creado con exito";

        
        
    }

}
