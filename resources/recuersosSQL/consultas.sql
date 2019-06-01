-- query para generar ARC
-- Nesecitamos los siguientes datos: codper, añoencurso, codemp

SELECT sno_personalisr.codper, sno_personalisr.codisr, sno_personalisr.porisr, sno_hsalida.anocur, 
                (SELECT SUM(valsal) FROM sno_hsalida, sno_hconcepto, sno_hperiodo WHERE sno_hsalida.codemp = 
                '0001' AND sno_hsalida.codper = '0016007868'AND
                sno_hperiodo.anocur = '2019' AND SUBSTR(cast(sno_hperiodo.fechasper as char(10)),1,4) = '2019' AND 
                sno_personalisr.codisr = SUBSTR(cast(sno_hperiodo.fechasper as char(10)),6,2) AND sno_hconcepto.aplarccon = 1 AND 
                (sno_hsalida.tipsal = 'A' OR sno_hsalida.tipsal = 'V1' OR sno_hsalida.tipsal = 'W1' OR sno_hsalida.tipsal = 'D' OR 
                sno_hsalida.tipsal = 'V2' OR sno_hsalida.tipsal = 'W2' OR sno_hsalida.tipsal = 'P1' OR sno_hsalida.tipsal = 'V3' OR 
                sno_hsalida.tipsal = 'W3') AND sno_hsalida.codemp = sno_hperiodo.codemp AND 
                sno_hsalida.anocur = sno_hperiodo.anocur AND sno_hsalida.codperi = sno_hperiodo.codperi AND sno_hsalida.codnom = sno_hperiodo.codnom AND 
                sno_hsalida.codemp = sno_hconcepto.codemp AND sno_hsalida.anocur = sno_hconcepto.anocur AND sno_hsalida.codperi = sno_hconcepto.codperi AND 
                sno_hsalida.codnom = sno_hconcepto.codnom AND sno_hsalida.codconc = sno_hconcepto.codconc AND 
                sno_hsalida.codemp = sno_personalisr.codemp AND sno_hsalida.codper = sno_personalisr.codper GROUP BY 
                sno_hsalida.codper, sno_hperiodo.anocur, sno_personalisr.codisr) as arc, (SELECT SUM(valsal) FROM 
                sno_hsalida, sno_hconcepto, sno_hperiodo WHERE sno_hsalida.codemp = '0001' AND 
                sno_hsalida.codper = '0016007868' AND sno_hperiodo.anocur = '2019' AND 
                SUBSTR(cast(sno_hperiodo.fechasper as char(10)),1,4) = '2019' AND sno_personalisr.codisr = SUBSTR(cast(sno_hperiodo.fechasper as char(10)),6,2) AND 
                sno_hconcepto.aplisrcon = 1 AND (sno_hsalida.tipsal = 'A' OR sno_hsalida.tipsal = 'V1' OR sno_hsalida.tipsal = 'W1' OR 
                sno_hsalida.tipsal = 'D' OR sno_hsalida.tipsal = 'V2' OR sno_hsalida.tipsal = 'W2' OR sno_hsalida.tipsal = 'P1' OR 
                sno_hsalida.tipsal = 'V3' OR sno_hsalida.tipsal = 'W3') AND 
                sno_hsalida.codemp = sno_hperiodo.codemp AND sno_hsalida.anocur = sno_hperiodo.anocur AND sno_hsalida.codperi = sno_hperiodo.codperi AND 
                sno_hsalida.codnom = sno_hperiodo.codnom AND sno_hsalida.codemp = sno_hconcepto.codemp AND 
                sno_hsalida.anocur = sno_hconcepto.anocur AND sno_hsalida.codperi = sno_hconcepto.codperi AND 
                sno_hsalida.codnom = sno_hconcepto.codnom AND sno_hsalida.codconc = sno_hconcepto.codconc AND 
                sno_hsalida.codemp = sno_personalisr.codemp AND sno_hsalida.codper = sno_personalisr.codper GROUP BY 
                sno_hsalida.codper, sno_hperiodo.anocur, sno_personalisr.codisr) as islr FROM sno_hsalida, 
                sno_personalisr WHERE sno_hsalida.codper = '0016007868' 
                AND sno_hsalida.codemp = '0001' AND sno_hsalida.anocur = '2019' 
                AND sno_hsalida.codemp = sno_personalisr.codemp AND 
                sno_hsalida.codper = sno_personalisr.codper GROUP BY sno_hsalida.codper, sno_hsalida.anocur, 
                sno_personalisr.codisr, sno_personalisr.porisr, sno_personalisr.codemp, sno_personalisr.codper 
                ORDER BY sno_personalisr.codisr



-- query para obtener la informacion del personal para ser impresa en el recibo de pago
-- Nesecitamos codper, codnom, codperi, añoensurso, codemp

SELECT sno_hpersonalnomina.codnom, sno_personal.codper, sno_personal.cedper, sno_personal.nomper, sno_personal.apeper, sno_personal.rifper,
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
                sno_categoria_rango.codcat=sno_rango.codcat) AS descat, (SELECT MAX(denestpro2) FROM spg_ep2 WHERE sno_hpersonalnomina.codemp='0001'  AND sno_hpersonalnomina.codnom = '0001' AND
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
                sno_hsalida.codnom  = '0001' AND sno_hsalida.anocur='2019' AND sno_hsalida.codperi='002' AND (sno_hsalida.tipsal<>'P2' AND
                sno_hsalida.tipsal<>'V4' AND sno_hsalida.tipsal<>'W4') AND sno_hpersonalnomina.codper>='0016007868' AND sno_hpersonalnomina.codper<='0016007868'AND
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
                sno_personal.codper