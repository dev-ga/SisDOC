<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Solicitud;
use Illuminate\Support\Facades\DB;

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
        $fecha = date('Y-m-d H:m:s');
       

        // dd($fecha);

        try {

            DB::table('solicitudes')->insert(
                [
                
                'nombresol' => $nombresol,
                'apellidosol' => $apellidosol,
                'cedulasol' => $cedulasol,
                'emailsol' => $emailsol,
                'tiposol' => $tiposol,
                'estatus_id' => $estatus,
                'created_at' => $fecha,
                'updated_at' => $fecha
                 
                 ]
            );
           
        } catch (Exception $exception) {
            
            return view('frontend.404');

        }
        // $mensaje = "Tu solicitud fue generada correctamente";
        // dd($mensaje);
        return back()->with('success','Tu solicitud fue generada correctamente');
        // dd('todo listo');
       
    }

    public function listarsolicitudes()
    {
        $sol = Solicitud::all();
        return view('listarsolicitudes', compact('sol'));
        // dd($sol);
    }

    public function actualizarestatus($id)
    {
        $sol = Solicitud::find($id);
        if($sol->estatus_id == 2){
            return back()->with('danger','El estatus ya fue actualizado!');
        }
        
        // dd($sol);
        DB::table('solicitudes')
            ->where('id', $id)
            ->update(['estatus_id' => 2]);
        
        return back()->with('success','El estatus fue actualizado con Exito!');

        
    }

    public function missolicitudes()
    {
        $cedula = auth()->user()->cedula;
        $sol = Solicitud::all()->where('cedulasol', $cedula);
        return view('missolicitudes', compact('sol'));
        dd($sol);
    }

   }
