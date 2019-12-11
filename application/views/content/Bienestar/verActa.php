<div class="d-flex justify-content-center">
    <button class="btn btn-info mb-2 mr-3" id="generarDocumento">Descargar documento</button>
    <!-- <button class="btn btn-info mb-2" id="generarpdf">Descargar PDF</button> -->
</div>


<div class="m-5">
        <div class="row">
            <div class=" col-4  d-flex justify-content-center align-items-center pt-1 pb-1 border"><img src="<?=base_url('assets/images_sac/logo.png')?>" style="width:60px;"></div>
            <div class=" col-4 pt-4 pl-4 pr-4   border bg-sena">Numero de acta:</div>
            <div class="col-4  pt-4 pl-4 pr-4   border " id="nombreDocumento" ><?=$Acta->consecutivo?></div>
        </div>
        <div class="row">
            <div class=" col-12 pt-4 pl-4 pr-4 pb-4  text-center border ">COMITÉ DE EVALUACIÓN Y SEQUIMIENTO</div>
        </div>  
        <div class="row">
            <div class=" col-4  p-0  border">
                <div class="pt-1 pb-1 bg-sena text-center">Ciudad y fecha:</div>
                <div class="text-center"> <?=$Acta->municipio.": ".$Acta->fecha?></div>
            </div>
            <div class=" col-4  p-0  border">
                <div class="pt-1 pb-1 bg-sena text-center">Hora incio:</div>
                <div class="text-center"> <?=$Acta->horaInicio?></div>
            </div>
            <div class=" col-4  p-0  border">
                <div class="pt-1 pb-1 bg-sena text-center">Hora fin:</div>
                <div class="text-center"> <?=$Acta->horaFin?></div>
            </div>
        </div>
        
        <div class="row">
            <div class=" col-6  p-0  border">
                <div class="pt-1 pb-1 bg-sena text-center">Sede:</div>
                <div class="text-center"> <?=$Acta->sede?></div>
            </div>
            <div class=" col-6  p-0  border">
                <div class="pt-1 pb-1 bg-sena text-center">Centro:</div>
                <div class="text-center"> <?=$Acta->centro?></div>
            </div>
        </div>
        
        <div class="row">
            <div class=" col-12  p-0  border">
                <div class="pt-1 pb-1 bg-sena text-center">Temas:</div>
                <div class="text-center"> <?=$Acta->temas." del area ".$Acta->area?></div>
            </div>
        </div>
        
        <div class="row">
            <div class=" col-12  p-0  border">
                <div class="pt-1 pb-1 bg-sena text-center">Objetivos:</div>
                <div class="text-center"> <?=$Acta->objetivo?></div>
            </div>
        </div>
    </div>
    

    <div class="m-5">
        <div class="row">
            <div class=" col-12  p-0  border">
                <div class="pt-1 pb-1 bg-sena text-center">Desarrollo de la reunión:</div>
            </div>
        </div>
        
        <div class="row">
            <div class=" col-12  p-0  border">
                <div class="pt-1 pb-1 pl-2 ">Temas a tratar:</div>
                <div class="pl-2"> <?=$Acta->temasTratar?></div>
            </div>
        </div>
        
        <div class="row">
            <div class=" col-12  p-0  border">
                <div class="pt-1 pb-1 pl-2 ">Desarrollo:</div>
                <div class="pl-2"> <?=$Acta->desarrolloReunion?></div>
            </div>
        </div>
        
    <?php
        /**
         * se crea para mostrar una nueva informacion en el acta de previsualizacion creando dos foreach
         */
        $variable = $reportes->result();
        $contador = 0;
        foreach ($datos as $array):
            ?>
            <div class="row">
                <div class=" col-12  p-0  border">
                    <div class="pt-1 pb-1 bg-sena text-center">Informe: <?=($contador+1)?></div>
                </div>
            </div>
            <div class="row">
                <div class=" col-3  p-0  border text-center bg-sena">
                    <div class="pl-2">Justificacion:</div>
                </div>
                <div class=" col-3  p-0  border text-center bg-sena">
                    <div class="pl-2">Normas reglamentarias:</div>
                </div>
                <div class=" col-3  p-0  border text-center bg-sena">
                    <div class="pl-2">Tipo de falta:</div>
                </div>
                <div class=" col-3  p-0  border text-center bg-sena">
                    <div class="pl-2">Tipo de calificación:</div>
                </div>
            </div>

            <div class="row">
                <div class=" col-3  p-0  border text-center">
                    <div class="pl-2" style="width: 100%; height: auto; word-wrap: break-word;"><?=$variable[$contador]->justificacion?></div>
                </div>
                <div class=" col-3  p-0  border text-center">
                    <div class="pl-2" style="width: 100%; height: auto; word-wrap: break-word;"><?=$variable[$contador]->normasReglamento?></div>
                </div>
                <div class=" col-3  p-0  border text-center">
                    <div class="pl-2" style="width: 100%; height: auto; word-wrap: break-word;"><?=$variable[$contador]->tipofalta?></div>
                </div>
                <div class=" col-3  p-0  border text-center">
                    <div class="pl-2" style="width: 100%; height: auto; word-wrap: break-word;"><?=$variable[$contador]->tipoCalificacion?></div>
                </div>
            </div>


            <div class="row">
                <div class=" col-3  p-0  border text-center bg-sena">
                    <div class="pl-2">Aprendiz:</div>
                </div>
                <div class=" col-3  p-0  border text-center bg-sena">
                    <div class="pl-2">Informe:</div>
                </div>
                <div class=" col-3  p-0  border text-center bg-sena">
                    <div class="pl-2">Descargos:</div>
                </div>
                <div class=" col-3  p-0  border text-center bg-sena">
                    <div class="pl-2">Recomendación:</div>
                </div>
            </div>
            <?php
            foreach ($array as $value):
            ?>
            <div class="row">
                <div class=" col-3  p-0  border">
                    <div class="pt-1 pb-1 pl-2 bg-light">Nombre:</div>
                    <div class="pl-2" style="width: 100%; height: auto; word-wrap: break-word;"> <?=$value->nombres?></div>
                    <div class="pt-1 pb-1 pl-2 bg-light">Documento:</div>
                    <div class="pl-2" style="width: 100%; height: auto; word-wrap: break-word;"> <?=$value->documento?></div>
                </div>
                <div class=" col-3  p-0  border text-center">
                    <div class="pl-2" style="width: 100%; height: auto; word-wrap: break-word;"><?=$value->informeEquipoEjecutor?></div>
                </div>
                <div class=" col-3  p-0  border text-center">
                    <div class="pl-2" style="width: 100%; height: auto; word-wrap: break-word;"><?=$value->descargosAprendiz?></div>
                </div>
                <div class=" col-3  p-0  border text-center">
                    <div class="pl-2" style="width: 100%; height: auto; word-wrap: break-word;"><?=$value->recomendaciones?></div>
                </div>
            </div>
    <?php
            endforeach;
            $contador ++;
        endforeach;
    ?> 
    
    <div class="row">
        <div class=" col-12  p-0  border">
            <div class="pt-1 pb-1 bg-sena text-center">Conclusiones:</div>
        </div>
    </div>
    
    <div class="row">
        <div class=" col-12  p-0  border">
            <div class="pl-2"> <?=$Acta->conclusiones?></div>
        </div>
    </div>
    
    <div class="row">
        <div class=" col-12  p-0  border">
            <div class="pt-1 pb-1 bg-sena text-center">Compromisos:</div>
        </div>
    </div>
    
    
    <div class="row">
        <div class=" col-4  p-0  border text-center">
            <div class="pl-2">Actividad:</div>
        </div>
        <div class=" col-4  p-0  border text-center">
            <div class="pl-2">Responsable:</div>
        </div>
        <div class=" col-4  p-0  border text-center">
            <div class="pl-2">Fecha:</div>
        </div>
    </div>
    
    
    <?php foreach ($compromisos->result() as $value):?>
        <div class="row">
            <div class=" col-4  p-0  border">
                <div class="pl-2"> <?=$value->actividad?></div>
            </div>
            <div class=" col-4  p-0  border">
                <div class="pl-2"> <?=$value->responsable?></div>
            </div>
            <div class=" col-4  p-0  border">
                <div class="pl-2"> <?=$value->fecha?></div>
            </div>
        </div>
        <?php endforeach;?>
           
        </div>
        
        
        
        
<div id="pdf" class="d-none" style="background:white; padding-top: 20px; padding-bottom: 20px;">
    <div class="Section0">
        <div>
            <table cellspacing="0" style="width: 453.6pt; border-collapse: collapse; ">
                <tbody>
                    <tr style="height: 69.0666656px">
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:103.6px;">
                            <p style="text-align:center;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;line-height:normal;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;mso-spacerun:yes;">&nbsp;</span><img src="80VPKS5D_images\80VPKS5D_img1.png" width="70" height="65"
                                    alt=""></p>
                        </td>
                        <td style="vertical-align:middle;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:501.2px;"
                            colspan="3">
                            <p style="text-align:center;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;line-height:normal;margin-top:0pt;margin-bottom:0pt;">
                                <span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">&nbsp;</span>
                            </p>
                            <p style="text-align:left;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;line-height:normal;margin-top:0pt;margin-bottom:0pt;">
                                <span style="font-family:Arial Narrow;font-size:11pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">ACTA No </span>
                                <span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;"><?=$Acta->consecutivo?></span>
                            </p>
                            <p style="text-align:center;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;line-height:normal;margin-top:0pt;margin-bottom:0pt;">
                                <span style="font-family:Times New Roman;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;">&nbsp;</span>
                            </p>
                            <p style="text-align:center;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;line-height:normal;margin-top:0pt;margin-bottom:0pt;">
                                <span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">&nbsp;</span>
                            </p>
                            <p style="text-align:center;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;line-height:normal;margin-top:0pt;margin-bottom:0pt;">
                                <span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">&nbsp;</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height: 2px">
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:604.8px;"
                            colspan="4">
                            <p style="text-align:center;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;">
                                <span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">&nbsp;</span>
                            </p>
                            <p style="text-align:center;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;">
                                <span style="font-family:Arial Narrow;font-size:11pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">COMITÉ DE EVALUACIÓN Y SEGUIMIENTO</span>
                            </p>
                            <p style="text-align:center;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;">
                                <span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">&nbsp;</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height: 35.6666679px">
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:199.2px;"
                            colspan="2">
                            <p style="text-align:left;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;line-height:normal;margin-top:0pt;margin-bottom:0pt;">
                                <span style="font-family:Arial Narrow;font-size:11pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">CIUDAD Y FECHA: </span>
                                <span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;"> <?=$Acta->municipio.": ".$Acta->fecha?></span>
                            </p>
                        </td>
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:206.8px;">
                            <p style="text-align:left;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;line-height:normal;margin-top:0pt;margin-bottom:0pt;">
                                <span style="font-family:Arial Narrow;font-size:11pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">HORA DE INICIO: </span>
                                <span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;"><?=$Acta->horaInicio?></span>
                            </p>
                            <p style="text-align:left;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;line-height:normal;margin-top:0pt;margin-bottom:0pt;">
                                <span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;">&nbsp;</span>
                            </p>
                        </td>
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:198.8px;">
                            <p style="text-align:left;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;line-height:normal;margin-top:0pt;margin-bottom:0pt;">
                                <span style="font-family:Arial Narrow;font-size:11pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">HORA FIN: </span>
                                <span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;"><?=$Acta->horaFin?></span>
                            </p>
                            <p style="text-align:left;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;line-height:normal;margin-top:0pt;margin-bottom:0pt;">
                                <span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;">&nbsp;</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height: 2px">
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:199.2px;"
                            colspan="2">
                            <p style="text-align:left;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;">
                                <span style="font-family:Arial Narrow;font-size:11pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">LUGAR: </span>
                                <span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;"> <?=$Acta->sede?></span>
                            </p>
                            <p style="text-align:left;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;">
                                <span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;">&nbsp;</span>
                            </p>
                        </td>
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:405.6px;"
                            colspan="2">
                            <p style="text-align:left;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:11pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">DIRECCIÓN GENERAL / REGIONAL / CENTRO</span></p>
                            <p style="text-align:left;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;"> <?=$Acta->centro?></span></p>
                        </td>
                    </tr>
                    <tr style="height: 2px">
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:604.8px;"
                            colspan="4">
                            <p style="text-align:left;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:11pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">TEMAS: </span></p>
                            <p style="text-align:left;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;"><?=$Acta->temas." del area ".$Acta->area?></span></p>
                        </td>
                    </tr>
                    <tr style="height: 2px">
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:604.8px;"
                            colspan="4">
                            <p style="text-align:left;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:11pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">OBJETIVO(S) DE LA REUNIÓN: </span><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;"><?=$Acta->objetivo?></span></p>
                            <p style="text-align:left;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;">&nbsp;</span></p>
                        </td>
                    </tr>
                    <tr style="height: 39.0666656px">
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left:none;border-right:none;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:604.8px;"
                            colspan="4">
                            <p style="text-align:left;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;line-height:normal;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">&nbsp;</span></p>
                        </td>
                    </tr>
                    <tr style="height: 2px">
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:604.8px;"
                            colspan="4">
                            <p style="text-align:center;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:11pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">DESARROLLO DE LA REUNIÓN</span></p>
                        </td>
                    </tr>
                    <tr style="height: 2px">
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:604.8px;"
                            colspan="4">
                            <p style="text-align:left;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:11pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">TEMAS A TRATAR</span></p>
                            <p style="text-align:left;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;"> <?=$Acta->temasTratar?></span></p>
                            <p style="text-align:left;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:11pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">DESARROLLO</span></p>
                            <p style="text-align:left;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;"> <?=$Acta->desarrolloReunion?></span></p>



                            <?php
                            /**
                             * for para recorer todos los aprencices que fueron citados por area
                             * 
                             */
                            $variable = $reportes->result();
        
                            $contador = 1;
                            foreach ($datos as $array):
                                foreach ($array as $value):
                            ?>

                            <p style="text-align:justify;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;background-color:#D3D3D3;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;text-decoration: underline;">INFORME <?=$contador?></span></p>
                            <p style="text-align:justify;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;">Los instructores Trae al comité el aprendiz del programa Tecnología _ con ficha </span><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;"> </span>
                                <span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;">del Municipio Rionegro.</span>
                            </p>
                            <p style="text-align:justify;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;">&nbsp;</span></p>
                            <p style="text-align:justify;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">Aprendiz:  <?=$value->nombres?></span></p>
                            <p style="text-align:justify;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">C.C <?=$value->documento?></span></p>
                            <p style="text-align:justify;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;">&nbsp;</span></p>
                            <p style="text-align:justify;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;"> <strong>Informe del equipo ejecutor de Instructores: </strong> <?=$value->informeEquipoEjecutor?></span></p>
                            <p style="text-align:justify;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;">&nbsp;</span></p>
                            <p style="text-align:justify;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;"><strong>Descargos:</strong>  <?=$value->descargosAprendiz?></span></p>
                            <p style="text-align:justify;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;">&nbsp;</span></p>
                            <p style="text-align:justify;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;"><strong>Recomendación:</strong>  <?=$value->recomendaciones?></span><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;">: </span></p>
                            <p style="text-align:justify;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;">&nbsp;</span></p>

                            <p style="text-align:justify;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;">&nbsp;</span></p>
                            <p style="text-align:justify;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;">&nbsp;</span></p>
                            <p style="text-align:justify;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;">&nbsp;</span></p>

                            <?php
                                $contador ++;
                                endforeach;
                                
                            endforeach;
                            ?> 



                        </td>
                    </tr>
                    <tr style="height: 2px">
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:604.8px;"
                            colspan="4">
                            <p style="text-align:center;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:11pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">CONCLUSIONES</span></p>
                        </td>
                    </tr>
                    <tr style="height: 2px">
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:604.8px;"
                            colspan="4">
                            <ul type="disc" style="margin:0pt; padding-left:0pt">
                                <li class="List-Paragraph" style="-sf-number-width:11.75977pt;margin-left:29.7597656pt;padding-left:6.24023438pt;text-indent:0pt;font-family:Symbol;font-weight:bold;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;"><?=$Acta->conclusiones?></span></li>
                            </ul>
                        </td>
                    </tr>
                    <tr style="height: 2px">
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:604.8px;"
                            colspan="4">
                            <p style="text-align:center;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:11pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">COMPROMISOS</span></p>
                        </td>
                    </tr>
                    <tr style="height: 2px">
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:199.2px;"
                            colspan="2">
                            <p style="text-align:center;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:11pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">ACTIVIDAD</span></p>
                        </td>
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:206.8px;">
                            <p style="text-align:center;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:11pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">RESPONSABLE</span></p>
                        </td>
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:198.8px;">
                            <p style="text-align:center;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:11pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">FECHA</span></p>
                        </td>
                    </tr>



                    <?php foreach ($compromisos->result() as $value):?>
                    <tr style="height: 2px">
                        <td style="vertical-align:middle;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:199.2px;"
                            colspan="2">
                            <p class="Estilo" style="text-align:justify;"><span style="font-family:Arial Narrow;font-size:11pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;"><?=$value->actividad?></span></p>
                        </td>
                        <td style="vertical-align:middle;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:206.8px;">
                            <p style="text-align:justify;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;"><?=$value->responsable?></span></p>
                        </td>
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:198.8px;">
                            <p style="text-align:left;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;"><?=$value->fecha?></span></p>
                        </td>
                    </tr>
                    <?php endforeach;?>




                    
                    <tr style="height: 27.0666656px">
                        <td style="vertical-align:middle;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:604.8px;"
                            colspan="4">
                            <p style="text-align:center;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;line-height:normal;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:11pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">ASISTENTES</span></p>
                        </td>
                    </tr>
                    <tr style="height: 2px">
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:199.2px;"
                            colspan="2">
                            <p style="text-align:center;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:11pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">NOMBRE</span></p>
                        </td>
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:206.8px;">
                            <p style="text-align:center;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:11pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">CARGO/DEPENDENCIA/ENTIDAD</span></p>
                        </td>
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:198.8px;">
                            <p style="text-align:center;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:11pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">FIRMA</span></p>
                        </td>
                    </tr>
                    <tr style="height: 2px">
                        <td style="vertical-align:middle;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:199.2px;"
                            colspan="2">
                            <p style="text-align:justify;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;">&nbsp;</span></p>
                        </td>
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:206.8px;">
                            <p style="text-align:left;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:normal;font-style:normal;font-variant:normal;">&nbsp;</span></p>
                        </td>
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:198.8px;">
                            <p style="text-align:left;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">&nbsp;</span></p>
                        </td>
                    </tr>
                    <tr style="height: 37.2px">
                        <td style="vertical-align:middle;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:604.8px;"
                            colspan="4">
                            <p style="text-align:center;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;line-height:normal;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:11pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">INVITADOS (Opcional)</span></p>
                        </td>
                    </tr>
                    <tr style="height: 2px">
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:199.2px;"
                            colspan="2">
                            <p style="text-align:center;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:11pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">NOMBRE</span></p>
                        </td>
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:206.8px;">
                            <p style="text-align:center;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:11pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">CARGO</span></p>
                        </td>
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:198.8px;">
                            <p style="text-align:center;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:11pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">ENTIDAD</span></p>
                        </td>
                    </tr>
                    <tr style="height: 19.0666676px">
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:199.2px;"
                            colspan="2">
                            <p style="text-align:left;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;line-height:normal;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">&nbsp;</span></p>
                        </td>
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:206.8px;">
                            <p style="text-align:left;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;line-height:normal;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">&nbsp;</span></p>
                        </td>
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:198.8px;">
                            <p style="text-align:left;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;line-height:normal;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">&nbsp;</span></p>
                        </td>
                    </tr>
                    <tr style="height: 27.8000011px">
                        <td style="vertical-align:top;border-top-style:solid;border-top-color:#000000;border-top-width:1pt;border-left-style:solid;border-left-color:#000000;border-left-width:1pt;border-right-style:solid;border-right-color:#000000;border-right-width:1pt;border-bottom-style:solid;border-bottom-color:#000000;border-bottom-width:1pt;padding-left:5.4pt;padding-right:5.4pt;padding-top:0pt;padding-bottom:0pt;width:604.8px;"
                            colspan="4">
                            <p style="text-align:left;page-break-inside:auto;page-break-after:auto;page-break-before:avoid;line-height:normal;margin-top:0pt;margin-bottom:0pt;"><span style="font-family:Arial Narrow;font-size:12pt;text-transform:none;font-weight:bold;font-style:normal;font-variant:normal;">&nbsp;</span></p>
                        </td>
                    </tr>
                    <tr style="height:0px;">
                        <td style="width:103.6px;border:none;padding:0pt;"></td>
                        <td style="width:95.6px;border:none;padding:0pt;"></td>
                        <td style="width:206.8px;border:none;padding:0pt;"></td>
                        <td style="width:198.8px;border:none;padding:0pt;"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
