SELECT sno_hconcepto.codconc, sno_hconcepto.titcon as nomcon, sno_hsalida.valsal , sno_hsalida.tipsal,
                abs(sno_hconceptopersonal.acuemp) AS acuemp, abs(sno_hconceptopersonal.acupat) AS acupat ,
                sno_hconcepto.repacucon, sno_hconcepto.repconsunicon, sno_hconcepto.consunicon,
                (SELECT moncon FROM sno_hconstantepersonal WHERE sno_hconcepto.repconsunicon='1' AND
                sno_hconstantepersonal.codper = '0016007868' AND sno_hconstantepersonal.codemp = sno_hconcepto.codemp AND
                sno_hconstantepersonal.codnom = sno_hconcepto.codnom AND sno_hconstantepersonal.anocur = sno_hconcepto.anocur
                AND sno_hconstantepersonal.codperi = sno_hconcepto.codperi AND sno_hconstantepersonal.codcons = sno_hconcepto.consunicon ) AS unidad
                FROM sno_hsalida, sno_hconcepto, sno_hconceptopersonal WHERE sno_hsalida.codemp='0001' AND sno_hsalida.codnom  = '0001' AND
                sno_hsalida.anocur='2019' AND sno_hsalida.codperi='007' AND sno_hsalida.codper='0016007868' AND sno_hsalida.valsal<>0 AND
                (sno_hsalida.tipsal='A' OR sno_hsalida.tipsal='V1' OR sno_hsalida.tipsal='W1' OR sno_hsalida.tipsal='D' OR sno_hsalida.tipsal='V2'
                OR sno_hsalida.tipsal='W2' OR sno_hsalida.tipsal='P1' OR sno_hsalida.tipsal='V3' OR sno_hsalida.tipsal='W3') AND
                sno_hsalida.codemp = sno_hconcepto.codemp AND sno_hsalida.codnom = sno_hconcepto.codnom AND sno_hsalida.anocur = sno_hconcepto.anocur
                AND sno_hsalida.codperi = sno_hconcepto.codperi AND sno_hsalida.codconc = sno_hconcepto.codconc AND
                sno_hsalida.codemp = sno_hconceptopersonal.codemp AND sno_hsalida.codnom = sno_hconceptopersonal.codnom AND
                sno_hsalida.anocur = sno_hconceptopersonal.anocur AND sno_hsalida.codperi = sno_hconceptopersonal.codperi AND
                sno_hsalida.codconc = sno_hconceptopersonal.codconc AND sno_hsalida.codper = sno_hconceptopersonal.codper ORDER BY
                sno_hconcepto.codconc, sno_hsalida.tipsal