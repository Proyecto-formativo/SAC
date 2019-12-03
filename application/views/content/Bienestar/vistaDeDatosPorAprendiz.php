<?php
//var_export($reportes->result());
$contador = 1;
foreach ($datos as $array):
    ?>
    <div class="row">
            <div class=" col-12  p-0  border">
                <div class="pt-1 pb-1 bg-sena text-center">Informe: <?=$contador?></div>
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
    foreach ($reportes->result() as  $value):
        ?>
        <div class="row">
            <div class=" col-3  p-0  border text-center">
                <div class="pl-2"><?=$value->justificacion?></div>
            </div>
            <div class=" col-3  p-0  border text-center">
                <div class="pl-2"><?=$value->normasReglamento?></div>
            </div>
            <div class=" col-3  p-0  border text-center">
                <div class="pl-2"><?=$value->tipofalta?></div>
            </div>
            <div class=" col-3  p-0  border text-center">
                <div class="pl-2"><?=$value->tipoCalificacion?></div>
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
                <div class="pl-2"> <?=$value->nombres?></div>
                <div class="pt-1 pb-1 pl-2 bg-light">Documento:</div>
                <div class="pl-2"> <?=$value->documento?></div>
            </div>
            <div class=" col-3  p-0  border text-center">
                <div class="pl-2"><?=$value->informeEquipoEjecutor?></div>
            </div>
            <div class=" col-3  p-0  border text-center">
                <div class="pl-2"><?=$value->descargosAprendiz?></div>
            </div>
            <div class=" col-3  p-0  border text-center">
                <div class="pl-2"><?=$value->recomendaciones?></div>
            </div>
        </div>
        <?php
        endforeach;
    endforeach;
    $contador ++;
endforeach;
?> 