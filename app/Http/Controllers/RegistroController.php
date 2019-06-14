<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Organizacion;
use App\Usuario;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;



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

   /*try{*/

    
        $validacion = validator::make($request->all(),
            [
                'nombre' => 'required|max:50',
                'apellido' => 'required|max:50',
                'cedula' => 'required|max:10',
                'organizacion_id' => 'required|max:1',
                'email' => 'email|unique:usuarios',
                'password'=> 'required|min:6|max:10'

            ]);
    
   
        if ($validacion->fails())
        
        {
            return redirect('/auth/registrousuarios')->withInput()->withErrors($validacion);
        }
      
      try{

        $usuarios = array(
            
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'cedula' => $request->cedula,
            'organizacion_id' => $request->organizacion_id,
            'email' => $request->email,
            'password' => bcrypt($request->password)
            //'password' => Hash::make($request->newPassword) -> debo probar esta linea para ver como se comporta...
            );

        Usuario::create($usuarios);

        
        return view('frontend.registroOK');

        }

        catch (Exception $exception)
        {
            /*dd ($exception);*/
            return view('errors.custom');
        }
      
        
    }

}




        /*catch (Exception $e) {
            throw new QueryException(
                $query, $this->prepareBindings($bindings), $e
            );
        }*/
