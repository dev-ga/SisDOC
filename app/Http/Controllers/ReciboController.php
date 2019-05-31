<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Periodo;
use App\Organizacion;
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
        
        
        // Para generar todas las nominas asociadas al codigo de personal

        $query = "select codnom from sno_personalnomina where codper = '$codper' order by codnom asc";

        $codnom = DB::connection('sigesp')->select($query);
        

        //Para seleccionar el codigo de la empresa directo de nuestra base de datos principal

        $codemp = Organizacion::All();
        
        //Para seleccionar el codigo de periodo directo de nuestra base de datos principal
        
        $codperi = Periodo::All();

        // Generamos el año en curso directo de la fecha del servidor

        $date = date("Y");

     
        return view('frontend.recibo')->with('codnom', $codnom)->with('codperi', $codperi)->with('date', $date)->with('codemp', $codemp);

    }

   
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
            
            
        /*Obtenemos la informacion que nos envia el metodo POST*/

           
            $codnom = $request->input("codnom");
            $codperi = $request->input("codperi");
            $codemp = $request->input("codemp");
            $date = $request->input("date");


        /*generamos el query que forma el recibo de pago*/

                            
            $query_recibo =     "SELECT sno_hconcepto.codconc, sno_hconcepto.titcon as nomcon, sno_hsalida.valsal ,
                                sno_hsalida.tipsal,abs(sno_hconceptopersonal.acuemp) AS acuemp, abs(sno_hconceptopersonal.acupat) 
                                AS acupat,sno_hconcepto.repacucon, sno_hconcepto.repconsunicon, sno_hconcepto.consunicon,
                                (SELECT moncon FROM sno_hconstantepersonal WHERE sno_hconcepto.repconsunicon='1' AND sno_hconstantepersonal.codper = '$codper' AND sno_hconstantepersonal.codemp = sno_hconcepto.codemp AND 
                                sno_hconstantepersonal.codnom = sno_hconcepto.codnom AND sno_hconstantepersonal.anocur = sno_hconcepto.anocur AND sno_hconstantepersonal.codperi = sno_hconcepto.codperi AND 
                                sno_hconstantepersonal.codcons = sno_hconcepto.consunicon ) AS unidad 
                                FROM sno_hsalida, sno_hconcepto, sno_hconceptopersonal 
                                WHERE sno_hsalida.codemp='$codemp' AND sno_hsalida.codnom  = '$codnom' AND sno_hsalida.anocur='$date' AND sno_hsalida.codperi='$codperi' AND sno_hsalida.codper='$codper' AND sno_hsalida.valsal<>0 
                                AND (sno_hsalida.tipsal='A' OR sno_hsalida.tipsal='V1' OR sno_hsalida.tipsal='W1' OR sno_hsalida.tipsal='D' OR sno_hsalida.tipsal='V2' OR sno_hsalida.tipsal='W2' OR sno_hsalida.tipsal='P1' OR 
                                sno_hsalida.tipsal='V3' OR sno_hsalida.tipsal='W3') AND sno_hsalida.codemp = sno_hconcepto.codemp AND sno_hsalida.codnom = sno_hconcepto.codnom AND sno_hsalida.anocur = sno_hconcepto.anocur AND
                                sno_hsalida.codperi = sno_hconcepto.codperi AND sno_hsalida.codconc = sno_hconcepto.codconc AND      sno_hsalida.codemp = sno_hconceptopersonal.codemp AND sno_hsalida.codnom = 
                                sno_hconceptopersonal.codnom AND sno_hsalida.anocur = sno_hconceptopersonal.anocur AND sno_hsalida.codperi = sno_hconceptopersonal.codperi 
                                AND sno_hsalida.codconc = sno_hconceptopersonal.codconc AND sno_hsalida.codper = sno_hconceptopersonal.codper 
                                ORDER BY sno_hconcepto.codconc, sno_hsalida.tipsal";

            $query_recibo = DB::connection('sigesp')->select($query_recibo);


            /*generamos el query para la cabecera del PDF*/

            $query_cabecera =   "SELECT sno_hpersonalnomina.codnom, sno_personal.codper, sno_personal.cedper, sno_personal.nomper, sno_personal.apeper, sno_personal.rifper,
                                MAX(sno_hpersonalnomina.fecingper) as fecingnom, sno_personal.nacper, sno_personal.fecegrper, sno_personal.fecleypen,sno_personal.codorg,
                                sno_hpersonalnomina.obsrecper, sno_hpersonalnomina.codcueban, sno_hpersonalnomina.tipcuebanper, sno_personal.fecingper,
                                sum(sno_hsalida.valsal) as total, sno_hunidadadmin.desuniadm, sno_hunidadadmin.minorguniadm,sno_hunidadadmin.ofiuniadm,
                                sno_hunidadadmin.uniuniadm,sno_hunidadadmin.depuniadm, sno_hunidadadmin.prouniadm, MAX(sno_hpersonalnomina.sueper) AS sueper,
                                MAX(sno_hpersonalnomina.pagbanper) AS pagbanper, MAX(sno_hpersonalnomina.pagefeper) AS pagefeper,
                                MAX(sno_ubicacionfisica.desubifis) AS desubifis, MAX(sno_hpersonalnomina.fecculcontr) AS fecculcontr,
                                MAX(sno_hpersonalnomina.descasicar) AS descasicar,MAX(sno_hpersonalnomina.sueintper) AS sueintper,
                                MAX(sno_hpersonalnomina.sueproper) as sueproper, (SELECT tipnom FROM sno_hnomina WHERE
                                sno_hpersonalnomina.codemp = sno_hnomina.codemp AND sno_hpersonalnomina.codnom = sno_hnomina.codnom AND
                                sno_hpersonalnomina.anocur = sno_hnomina.anocurnom AND sno_hpersonalnomina.codperi = sno_hnomina.peractnom) AS tiponom,
                                (SELECT suemin FROM sno_hclasificacionobrero WHERE sno_hclasificacionobrero.codemp = sno_hpersonalnomina.codemp AND
                                sno_hclasificacionobrero.codnom = sno_hpersonalnomina.codnom AND sno_hclasificacionobrero.anocur = sno_hpersonalnomina.anocur
                                AND sno_hclasificacionobrero.codperi = sno_hpersonalnomina.codperi AND sno_hclasificacionobrero.grado = sno_hpersonalnomina.grado) AS sueobr,
                                (SELECT desest FROM sigesp_estados WHERE sigesp_estados.codpai = sno_ubicacionfisica.codpai AND sigesp_estados.codest = sno_ubicacionfisica.codest) AS desest,
                                (SELECT denmun FROM sigesp_municipio WHERE sigesp_municipio.codpai = sno_ubicacionfisica.codpai AND sigesp_municipio.codest = sno_ubicacionfisica.codest AND
                                sigesp_municipio.codmun = sno_ubicacionfisica.codmun) AS denmun, (SELECT denpar FROM sigesp_parroquia WHERE sigesp_parroquia.codpai = sno_ubicacionfisica.codpai AND
                                sigesp_parroquia.codest = sno_ubicacionfisica.codest AND sigesp_parroquia.codmun = sno_ubicacionfisica.codmun AND sigesp_parroquia.codpar = sno_ubicacionfisica.codpar) AS denpar,
                                (SELECT nomban FROM scb_banco WHERE scb_banco.codemp = sno_hpersonalnomina.codemp AND scb_banco.codban = sno_hpersonalnomina.codban) AS banco, (SELECT nomage
                                FROM scb_agencias WHERE scb_agencias.codemp = sno_hpersonalnomina.codemp AND scb_agencias.codban = sno_hpersonalnomina.codban AND
                                scb_agencias.codage = sno_hpersonalnomina.codage) AS agencia, (SELECT sno_categoria_rango.descat FROM sno_rango, sno_categoria_rango WHERE
                                sno_rango.codemp=sno_personal.codemp AND sno_rango.codcom=sno_personal.codcom AND sno_rango.codran=sno_personal.codran AND
                                sno_categoria_rango.codcat=sno_rango.codcat) AS descat, (SELECT MAX(denestpro2) FROM spg_ep2 WHERE sno_hpersonalnomina.codemp='$codemp'  AND sno_hpersonalnomina.codnom = '$codnom' AND
                                sno_hpersonalnomina.codemp = sno_hunidadadmin.codemp AND sno_hpersonalnomina.minorguniadm = sno_hunidadadmin.minorguniadm AND
                                sno_hpersonalnomina.ofiuniadm = sno_hunidadadmin.ofiuniadm AND sno_hpersonalnomina.uniuniadm = sno_hunidadadmin.uniuniadm AND
                                sno_hpersonalnomina.depuniadm = sno_hunidadadmin.depuniadm AND sno_hpersonalnomina.prouniadm = sno_hunidadadmin.prouniadm AND
                                sno_hunidadadmin.codestpro1 = spg_ep2.codestpro1 AND sno_hunidadadmin.codestpro2 = spg_ep2.codestpro2) AS denestpro2,
                                (SELECT codasicar FROM sno_hasignacioncargo WHERE sno_hpersonalnomina.codemp = sno_hasignacioncargo.codemp AND
                                sno_hpersonalnomina.codnom = sno_hasignacioncargo.codnom AND sno_hpersonalnomina.anocur = sno_hasignacioncargo.anocur AND
                                sno_hpersonalnomina.codperi = sno_hasignacioncargo.codperi AND sno_hpersonalnomina.codasicar = sno_hasignacioncargo.codasicar) as codcar,
                                (SELECT denasicar FROM sno_hasignacioncargo WHERE sno_hpersonalnomina.codemp = sno_hasignacioncargo.codemp AND
                                sno_hpersonalnomina.codnom = sno_hasignacioncargo.codnom AND sno_hpersonalnomina.anocur = sno_hasignacioncargo.anocur AND
                                sno_hpersonalnomina.codperi = sno_hasignacioncargo.codperi AND sno_hpersonalnomina.codasicar = sno_hasignacioncargo.codasicar) as descar FROM
                                sno_personal, sno_hpersonalnomina, sno_hsalida, sno_hunidadadmin, sno_ubicacionfisica WHERE sno_hsalida.codemp='0001' AND
                                sno_hsalida.codnom  = '$codnom' AND sno_hsalida.anocur='2019' AND sno_hsalida.codperi='$codperi' AND (sno_hsalida.tipsal<>'P2' AND
                                sno_hsalida.tipsal<>'V4' AND sno_hsalida.tipsal<>'W4') AND sno_hpersonalnomina.codper>='$codper' AND sno_hpersonalnomina.codper<='$codper'AND
                                sno_hsalida.valsal<>0 AND (sno_hsalida.tipsal='A' OR sno_hsalida.tipsal='V1' OR sno_hsalida.tipsal='W1' OR sno_hsalida.tipsal='D' OR sno_hsalida.tipsal='V2'
                                OR sno_hsalida.tipsal='W2' OR sno_hsalida.tipsal='P1' OR sno_hsalida.tipsal='V3' OR sno_hsalida.tipsal='W3') AND
                                sno_hpersonalnomina.codemp = sno_hsalida.codemp AND sno_hpersonalnomina.codnom = sno_hsalida.codnom AND
                                sno_hpersonalnomina.anocur = sno_hsalida.anocur AND sno_hpersonalnomina.codperi = sno_hsalida.codperi AND
                                sno_hpersonalnomina.codper = sno_hsalida.codper AND sno_hpersonalnomina.codemp = sno_ubicacionfisica.codemp AND
                                sno_hpersonalnomina.codubifis = sno_ubicacionfisica.codubifis AND sno_hpersonalnomina.codemp = sno_personal.codemp AND
                                sno_hpersonalnomina.codper = sno_personal.codper AND sno_hpersonalnomina.codemp = sno_hunidadadmin.codemp AND
                                sno_hpersonalnomina.codnom = sno_hunidadadmin.codnom AND sno_hpersonalnomina.anocur = sno_hunidadadmin.anocur AND
                                sno_hpersonalnomina.codperi = sno_hunidadadmin.codperi AND sno_hpersonalnomina.minorguniadm = sno_hunidadadmin.minorguniadm
                                AND sno_hpersonalnomina.ofiuniadm = sno_hunidadadmin.ofiuniadm AND sno_hpersonalnomina.uniuniadm = sno_hunidadadmin.uniuniadm
                                AND sno_hpersonalnomina.depuniadm = sno_hunidadadmin.depuniadm AND sno_hpersonalnomina.prouniadm = sno_hunidadadmin.prouniadm
                                GROUP BY sno_hpersonalnomina.codemp, sno_hpersonalnomina.codnom, sno_hpersonalnomina.anocur, sno_hpersonalnomina.codperi,
                                sno_personal.codemp,sno_personal.codcom, sno_personal.codran, sno_personal.codper, sno_personal.cedper, sno_personal.nomper,
                                sno_personal.apeper, sno_personal.rifper, sno_personal.nacper,sno_personal.fecingper, sno_personal.fecegrper, sno_personal.fecleypen,
                                sno_hpersonalnomina.codcueban, sno_hpersonalnomina.tipcuebanper, sno_personal.fecingper, sno_hunidadadmin.desuniadm,
                                sno_hpersonalnomina.codasicar, sno_hpersonalnomina.codcar, sno_hpersonalnomina.codban, sno_hunidadadmin.minorguniadm,
                                sno_hunidadadmin.ofiuniadm, sno_hunidadadmin.uniuniadm,sno_hunidadadmin.depuniadm, sno_hunidadadmin.prouniadm,
                                sno_ubicacionfisica.codpai, sno_ubicacionfisica.codest,sno_ubicacionfisica.codmun,sno_ubicacionfisica.codpar,
                                sno_hpersonalnomina.codage,sno_personal.codorg,sno_hpersonalnomina.grado, sno_hpersonalnomina.obsrecper,
                                sno_hunidadadmin.codemp,sno_hpersonalnomina.minorguniadm,sno_hpersonalnomina.ofiuniadm,sno_hpersonalnomina.uniuniadm,
                                sno_hpersonalnomina.depuniadm,sno_hpersonalnomina.prouniadm,sno_hunidadadmin.codestpro1,sno_hunidadadmin.codestpro2 ORDER BY
                                sno_personal.codper";

                           
            $query_cabecera = DB::connection('sigesp')->select($query_cabecera);
            

            /*Ruta de prueba*/

            $pdf = PDF::loadView('pruebapdf', array('query_cabecera' => $query_cabecera), array('query_recibo' => $query_recibo));
            
            return $pdf->download('Recibo.pdf');
   
             // // $pdf->setpaper('a4','landscape'); ->para colocar la hoja horizontal

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
