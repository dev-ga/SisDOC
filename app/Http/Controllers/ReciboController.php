<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Periodo;
use App\Organizacion;
use Illuminate\Support\Facades\DB;

class ReciboController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codper = auth()->user()->cedula;
        /*$codemp = auth()->user()->organizacion_id;
        $organizacion = Organizacion::all()->where('id','=',$codemp);
        dd($organizacion);*/
        

        /*$usuario = Usuario::All();*/
        /*dd($u);*/
        $query = "select codnom from sno_personalnomina where codper = '$codper' order by codnom asc";
         
        /*$query = "select * from sno_personalnomina inner join sno_periodo on sno_personalnomina.codnom = sno_periodo.codnom where sno_personalnomina.codper = '$codper'";*/
        /*$query2 = "select * from sno_personalnomina inner join sno_periodo on sno_personalnomina.codnom = sno_periodo.codnom where sno_personalnomina.codper = '$codper'";*/
        
        $codnom = DB::connection('sigesp')->select($query);

        /*dd($codnom);*/
        
        $codperi = Periodo::All();

        $date = date("Y");

     
        

        /*dd($usuario);*/
        /*return view('frontend.recibo', compact('usuario'));*/

        return view('frontend.recibo')->with('codnom', $codnom)->with('codperi', $codperi)->with('date', $date);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pdf(Request $request)
    {
        /*Obtenmos el codper => cedula de emplado*/

            $codper = auth()->user()->cedula;
            

        /*Obtenemos el codemp => codigo de la empresa que lo tiene el campo codemp_sigesp de la tabla organizaciones*/

            $codemp = Organizacion::All();
                
            
        /*Obtenemos la informacion que nos envia el metodo POST*/

           
            $codnom = $request->input("codnom");
            $codperi = $request->input("codperi");
            $date = $request->input("date");


        /*generamos el query que forma el recibo de pago*/

                            
            $querypdf = "SELECT sno_hconcepto.codconc, sno_hconcepto.titcon as nomcon, sno_hsalida.valsal , sno_hsalida.tipsal,abs(sno_hconceptopersonal.acuemp) AS acuemp, abs(sno_hconceptopersonal.acupat) AS        acupat,sno_hconcepto.repacucon, sno_hconcepto.repconsunicon, sno_hconcepto.consunicon,
                            (SELECT moncon FROM sno_hconstantepersonal WHERE sno_hconcepto.repconsunicon='1' AND sno_hconstantepersonal.codper = '$codper' AND sno_hconstantepersonal.codemp = sno_hconcepto.codemp AND sno_hconstantepersonal.codnom = sno_hconcepto.codnom AND sno_hconstantepersonal.anocur = sno_hconcepto.anocur AND sno_hconstantepersonal.codperi = sno_hconcepto.codperi AND sno_hconstantepersonal.codcons = sno_hconcepto.consunicon ) AS unidad 
                        FROM sno_hsalida, sno_hconcepto, sno_hconceptopersonal 
                        WHERE sno_hsalida.codemp='0001' AND sno_hsalida.codnom  = '$codnom' AND sno_hsalida.anocur='$date' AND sno_hsalida.codperi='$codperi' AND sno_hsalida.codper='$codper' AND sno_hsalida.valsal<>0 AND (sno_hsalida.tipsal='A' OR sno_hsalida.tipsal='V1' OR sno_hsalida.tipsal='W1' OR sno_hsalida.tipsal='D' OR sno_hsalida.tipsal='V2' OR sno_hsalida.tipsal='W2' OR sno_hsalida.tipsal='P1' OR sno_hsalida.tipsal='V3' OR sno_hsalida.tipsal='W3') AND sno_hsalida.codemp = sno_hconcepto.codemp AND sno_hsalida.codnom = sno_hconcepto.codnom AND sno_hsalida.anocur = sno_hconcepto.anocur AND sno_hsalida.codperi = sno_hconcepto.codperi AND sno_hsalida.codconc = sno_hconcepto.codconc AND      sno_hsalida.codemp = sno_hconceptopersonal.codemp AND sno_hsalida.codnom = sno_hconceptopersonal.codnom AND sno_hsalida.anocur = sno_hconceptopersonal.anocur AND sno_hsalida.codperi = sno_hconceptopersonal.codperi AND sno_hsalida.codconc = sno_hconceptopersonal.codconc AND sno_hsalida.codper = sno_hconceptopersonal.codper 
                        ORDER BY sno_hconcepto.codconc, sno_hsalida.tipsal";
                    
                            
            $infopdf = DB::connection('sigesp')->select($querypdf);
            
            dd($infopdf);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
