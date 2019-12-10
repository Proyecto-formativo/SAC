<div class="d-flex justify-content-center">
    <button class="btn btn-info mb-2" id="generarpdf">Descargar</button>
</div>
<div id="pdf" style="background:white; padding-top: 20px; padding-bottom: 20px;">

    <div class="m-5">
        <div class="row">
            <div class=" col-4  d-flex justify-content-center align-items-center pt-1 pb-1 border"><img src="<?=base_url('assets/images_sac/logo.png')?>" style="width:60px;"></div>
            <div class=" col-4 pt-4 pl-4 pr-4   border bg-sena">Numero de acta:</div>
            <div class="col-4  pt-4 pl-4 pr-4   border " ><?=$Acta->consecutivo?></div>
        </div>
        <div class="row">
            <div class=" col-12 pt-4 pl-4 pr-4 pb-4  text-center border ">COMITE DE EVALUACION Y SEQUIMIENTO</div>
        </div>  
        <div class="row">
            <div class=" col-4  p-0  border">
                <div class="pt-1 pb-1 bg-sena text-center">ciudad y fecha</div>
                <div class="text-center"> <?=$Acta->municipio.": ".$Acta->fecha?></div>
            </div>
            <div class=" col-4  p-0  border">
                <div class="pt-1 pb-1 bg-sena text-center">Hora incio</div>
                <div class="text-center"> <?=$Acta->horaInicio?></div>
            </div>
            <div class=" col-4  p-0  border">
                <div class="pt-1 pb-1 bg-sena text-center">Hora fin</div>
                <div class="text-center"> <?=$Acta->horaFin?></div>
            </div>
        </div>

        <div class="row">
            <div class=" col-6  p-0  border">
                <div class="pt-1 pb-1 bg-sena text-center">Sede:</div>
                <div class="text-center"> <?=$Acta->sede?></div>
            </div>
            <div class=" col-6  p-0  border">
                <div class="pt-1 pb-1 bg-sena text-center">centro</div>
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
                <div class="pt-1 pb-1 bg-sena text-center">Desarrollo de la reunion:</div>
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

        <?=$vistaDatosPoraprendiz?>

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
                <div class="pl-2">Actividad</div>
            </div>
            <div class=" col-4  p-0  border text-center">
                <div class="pl-2">Responsable</div>
            </div>
            <div class=" col-4  p-0  border text-center">
                <div class="pl-2">Fecha</div>
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






</div>
