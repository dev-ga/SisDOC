<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Periodo;
use App\Organizacion;
use App\ConsultaArcPdf;
use Illuminate\Support\Facades\DB;
use PDF;

class ArcController extends Controller
{
   
    public function index()

    {

        /*$codper = auth()->user()->cedula;*/

        $codemp = Organizacion::All();

        // $date = date("Y");

        /*dd($codper, $codemp, $date);*/

        // return view('frontend.arcform')->with('date', $date)->with('codemp', $codemp);
        return view('frontend.arcform')->with('codemp', $codemp);

    }


    public function arc(Request $request)

    {

        $codper_usu = auth()->user()->cedula;

        // Completo con '0' a la izquierda hasta llegar a 10 caracteres
        $codper = str_pad($codper_usu, 10, "0", STR_PAD_LEFT); 
        
        $codemp = $request->input("codemp");
        
        $date   = $request->input("date");

        if ($date == '2018') 
        {
            $var = new ConsultaArcPdf();
            $querysnopersonal = $var->sqlsnopersonal($codper);
            $queryarccuerpo = $var->sqlarccuerpo2018($codper, $codemp, $date); //query año anterior
            $pdf = PDF::loadView('frontend.arc', compact('queryarccuerpo', 'querysnopersonal'));
            return $pdf->download('PanillaARC.pdf');

        }
        
        if ($date =='2019') 
        {
            $var = new ConsultaArcPdf();
            $querysnopersonal = $var->sqlsnopersonal($codper);
            $queryarccuerpo = $var->sqlarccuerpo($codper, $codemp, $date); //query año en curso
            $pdf = PDF::loadView('frontend.arc', compact('queryarccuerpo', 'querysnopersonal'));
            return $pdf->download('PanillaARC.pdf');
        }


    }

   
}
