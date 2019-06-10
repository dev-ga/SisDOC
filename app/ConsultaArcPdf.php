<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ConsultaArcPdf extends Model
{
    public function sqlsnopersonal($codper)

    {
    	$querysnopersonal = "select * from sno_personal where codper = '$codper'";

    	$querysnopersonal = DB::connection('sigesp')->select($querysnopersonal);

    	return $querysnopersonal;
    }

    public function sqlarccuerpo($codper, $codemp, $date)

    {
    	$queryarccuerpo = 		"SELECT sno_personalisr.codper, sno_personalisr.codisr, sno_personalisr.porisr, sno_hsalida.anocur, 
                                (SELECT SUM(valsal) FROM sno_hsalida, sno_hconcepto, sno_hperiodo WHERE sno_hsalida.codemp = 
                                '$codemp' AND sno_hsalida.codper = '$codper'AND
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
                                sno_hsalida.codper = '$codper' AND sno_hperiodo.anocur = '$date' AND 
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
                                sno_personalisr WHERE sno_hsalida.codper = '$codper' 
                                AND sno_hsalida.codemp = '$codemp' AND sno_hsalida.anocur = '$date' 
                                AND sno_hsalida.codemp = sno_personalisr.codemp AND 
                                sno_hsalida.codper = sno_personalisr.codper GROUP BY sno_hsalida.codper, sno_hsalida.anocur, 
                                sno_personalisr.codisr, sno_personalisr.porisr, sno_personalisr.codemp, sno_personalisr.codper 
                                ORDER BY sno_personalisr.codisr";

        $queryarccuerpo = DB::connection('sigesp')->select($queryarccuerpo);

    	return $queryarccuerpo;

    }
}
