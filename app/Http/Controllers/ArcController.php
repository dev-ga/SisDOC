<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Periodo;
use App\Organizacion;
use Illuminate\Support\Facades\DB;
use PDF;

class ArcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$codper = auth()->user()->cedula;*/

        $codemp = Organizacion::All();

        $date = date("Y");

        /*dd($codper, $codemp, $date);*/

        return view('frontend.arcform')->with('date', $date)->with('codemp', $codemp);
        


    }


    public function arc(Request $request)
    {
        $codper = auth()->user()->cedula;
        $codemp = $request->input("codemp");
        $date   = $request->input("date");
            /*dd($codemp, $date);*/


            $query_infotrabajador = "select * from sno_personal where codper = '00$codper'";

            $query_infotrabajador = DB::connection('sigesp')->select($query_infotrabajador);

            

                $query_arc = "SELECT sno_personalisr.codper, sno_personalisr.codisr, sno_personalisr.porisr, sno_hsalida.anocur, 
                                (SELECT SUM(valsal) FROM sno_hsalida, sno_hconcepto, sno_hperiodo WHERE sno_hsalida.codemp = 
                                '$codemp' AND sno_hsalida.codper = '00$codper'AND
                                sno_hperiodo.anocur = '$date' AND SUBSTR(cast(sno_hperiodo.fechasper as char(10)),1,4) = '$date' AND 
                                sno_personalisr.codisr = SUBSTR(cast(sno_hperiodo.fechasper as char(10)),6,2) AND sno_hconcepto.aplarccon = 1 AND 
                                (sno_hsalida.tipsal = 'A' OR sno_hsalida.tipsal = 'V1' OR sno_hsalida.tipsal = 'W1' OR sno_hsalida.tipsal = 'D' OR 
                                sno_hsalida.tipsal = 'V2' OR sno_hsalida.tipsal = 'W2' OR sno_hsalida.tipsal = 'P1' OR sno_hsalida.tipsal = 'V3' OR 
                                sno_hsalida.tipsal = 'W3') AND sno_hsalida.codemp = sno_hperiodo.codemp AND 
                                sno_hsalida.anocur = sno_hperiodo.anocur AND sno_hsalida.codperi = sno_hperiodo.codperi AND sno_hsalida.codnom = sno_hperiodo.codnom AND 
                                sno_hsalida.codemp = sno_hconcepto.codemp AND sno_hsalida.anocur = sno_hconcepto.anocur AND sno_hsalida.codperi = sno_hconcepto.codperi AND 
                                sno_hsalida.codnom = sno_hconcepto.codnom AND sno_hsalida.codconc = sno_hconcepto.codconc AND 
                                sno_hsalida.codemp = sno_personalisr.codemp AND sno_hsalida.codper = sno_personalisr.codper GROUP BY 
                                sno_hsalida.codper, sno_hperiodo.anocur, sno_personalisr.codisr) as arc, (SELECT SUM(valsal) FROM 
                                sno_hsalida, sno_hconcepto, sno_hperiodo WHERE sno_hsalida.codemp = '$codemp' AND 
                                sno_hsalida.codper = '00$codper' AND sno_hperiodo.anocur = '$date' AND 
                                SUBSTR(cast(sno_hperiodo.fechasper as char(10)),1,4) = '$date' AND sno_personalisr.codisr = SUBSTR(cast(sno_hperiodo.fechasper as char(10)),6,2) AND 
                                sno_hconcepto.aplisrcon = 1 AND (sno_hsalida.tipsal = 'A' OR sno_hsalida.tipsal = 'V1' OR sno_hsalida.tipsal = 'W1' OR 
                                sno_hsalida.tipsal = 'D' OR sno_hsalida.tipsal = 'V2' OR sno_hsalida.tipsal = 'W2' OR sno_hsalida.tipsal = 'P1' OR 
                                sno_hsalida.tipsal = 'V3' OR sno_hsalida.tipsal = 'W3') AND 
                                sno_hsalida.codemp = sno_hperiodo.codemp AND sno_hsalida.anocur = sno_hperiodo.anocur AND sno_hsalida.codperi = sno_hperiodo.codperi AND 
                                sno_hsalida.codnom = sno_hperiodo.codnom AND sno_hsalida.codemp = sno_hconcepto.codemp AND 
                                sno_hsalida.anocur = sno_hconcepto.anocur AND sno_hsalida.codperi = sno_hconcepto.codperi AND 
                                sno_hsalida.codnom = sno_hconcepto.codnom AND sno_hsalida.codconc = sno_hconcepto.codconc AND 
                                sno_hsalida.codemp = sno_personalisr.codemp AND sno_hsalida.codper = sno_personalisr.codper GROUP BY 
                                sno_hsalida.codper, sno_hperiodo.anocur, sno_personalisr.codisr) as islr FROM sno_hsalida, 
                                sno_personalisr WHERE sno_hsalida.codper = '00$codper' 
                                AND sno_hsalida.codemp = '$codemp' AND sno_hsalida.anocur = '$date' 
                                AND sno_hsalida.codemp = sno_personalisr.codemp AND 
                                sno_hsalida.codper = sno_personalisr.codper GROUP BY sno_hsalida.codper, sno_hsalida.anocur, 
                                sno_personalisr.codisr, sno_personalisr.porisr, sno_personalisr.codemp, sno_personalisr.codper 
                                ORDER BY sno_personalisr.codisr";

                $query_arc = DB::connection('sigesp')->select($query_arc);

                $pdf = PDF::loadView('frontend.arc', array('query_arc' => $query_arc), array('query_infotrabajador' => $query_infotrabajador));
            /*$pdf->setpaper('a4','landscape');*/
                return $pdf->download('PanillaARC.pdf');


                /*dd($query_arc);*/
    }

   
}
