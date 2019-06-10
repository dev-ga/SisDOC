<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Periodo;
use App\Organizacion;
use App\ConsultaReciboPdf;
use Illuminate\Support\Facades\DB;
use PDF;

class ReciboController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // Para generar el codigo de personal

        $codper = auth()->user()->cedula;

        //Para seleccionar el codigo de la empresa directo de nuestra base de datos principal

        $codemp = Organizacion::All();

        // Generamos el año en curso directo de la fecha del servidor

        $date = date("Y");

        /*Llamamos la clase ConsultaReciboPdf() */

        $var = new ConsultaReciboPdf();

        $querypersonalnom = $var->sqlpersonalnomina($codper);

        $querynomper = $var->sqlnominaperiodo($codper);

        /*dd($querynomper);*/

     
        
        return view('frontend.recibo')->with('querynomper', $querynomper)->with('querypersonalnom', $querypersonalnom)->with('date', $date)->with('codemp', $codemp);

    }

   
    
    public function pdf(Request $request)

    {

        /*Obtenmos el codper => cedula de emplado*/

        $codper_usu = auth()->user()->cedula;

        // Completo con '0' a la izquierda hasta llegar a 10 caracteres
        $codper = str_pad($codper_usu, 10, "0", STR_PAD_LEFT); 
            
            
        /*Obtenemos la informacion que nos envia el metodo POST*/

           
        $codnom = $request->input("codnom");

        $codperi = $request->input("codperi");

        $codemp = $request->input("codemp");

        $date = $request->input("date");


        /*Llamado de la función ConsultaReciboPdf*/

        $var = new ConsultaReciboPdf();

        $result = $var->sqlrecibopdfcabecera($codper, $codperi, $codnom, $codemp);

        $result2 = $var->sqlrecibopdfcuerpo($codnom, $codperi, $codemp, $codper, $date);

        $prueba2020 = "select * from sno_periodo where codperi = '$codperi' and codnom = '$codnom'";
        $prueba2020 = DB::connection('sigesp')->select($prueba2020);

        // $prueba = array($prueba2020);
        // dd($prueba);


        /*Imprecion del PDF*/

        $pdf = PDF::loadView('pdf', compact('result', 'result2', 'prueba2020'));

        return $pdf->download('Recibo.pdf');

    }

}
