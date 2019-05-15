<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Routing\Redirector; // -> redirect()
use Illuminate\Validation\Factory; // -> validator()
use App\Organizacion;

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

}
