<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Solicitud;

class ConstanciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function solicitudform()
    {
        return view('generarsolicitud');
    }

    public function procesarsolicitud(Request $request)
    {
        $nombresol = auth()->user()->nombre;
        $apellidosol = auth()->user()->apellido;
        $cedulasol = auth()->user()->cedula;
        $emailsol = auth()->user()->email;
        $tiposol = $request->input('tiposol');
        $estatus = 1; //---- estatus 1- por procesar 

        dd($nombresol, $apellidosol, $cedulasol, $emailsol, $tiposol, $estatus);

        // DB::table('solicitudes')->insert(
        //     [
            
        //     'nombresol' => '$nombresol',
        //     'apellidosol' => '$apellidosol',
        //     'cedulasol' => '$cedulasol',
        //     'emailsol' => '$emailsol',
        //     'tiposol' => '$tiposol',
        //     'estatus_id' => '$estatus'
             
        //      ]
        // );



        
    }

   }
