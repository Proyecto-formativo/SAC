<?php
// var_export($reportes->result());
$variable = $reportes->result();
// echo "<pre>";
// print_r($variable[0]->consecutivo);
// echo "</pre>";

$contador = 0;
foreach ($datos as $array):
    // echo "<pre>";
    // print_r($datos);
    // echo "</pre>";

    // return;
    ?>
    <div class="row">
        <div class=" col-12  p-0  border">
            <div class="pt-1 pb-1 bg-sena text-center">Informe: <?=($contador+1)?></div>
        </div>
    </div>
    <div class="row">
        <div class=" col-3  p-0  border text-center bg-sena">
            <div class="pl-2">justificacion</div>
        </div>
        <div class=" col-3  p-0  border text-center bg-sena">
            <div class="pl-2">Normas reglamentarias</div>
        </div>
        <div class=" col-3  p-0  border text-center bg-sena">
            <div class="pl-2">Tipo de falta</div>
        </div>
        <div class=" col-3  p-0  border text-center bg-sena">
            <div class="pl-2">Tipo de calificacion</div>
        </div>
    </div>
    <?php
    
    ?>
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
            <div class="pl-2">Recomendacion:</div>
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