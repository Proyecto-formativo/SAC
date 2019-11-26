<?php
foreach ($datos as $key):
    $i = 0;
    foreach($key as $valores):
        if ($i == 0):
            $i++;
            ?>
            
            <div class="bg-sena d-flex justify-content-around text-center p-2">
                <div>
                    <h2>Nombre programa:</h2>
                    <strong><?=$valores->nombre?></strong>
                </div>

                <div>
                    <h2>Numero ficha:</h2>
                    <strong><?=$valores->ficha?></strong>
                </div>
                <div>
                    <h2>Instructor Reporte:</h2>
                    <strong><?=$valores->instructor?></strong>
                </div>
            </div>
            <table class="table">
            <thead>
                <tr>
                    <!-- <th scope="col" ><strong>consecutivoAprendizReporte:</strong></th> -->
                    <!-- <th scope="col"><strong>consReporte:</strong> </th> -->
                    <th scope="col"><strong>Documento:</strong></th>
                    <th scope="col"><strong>Nombre Aprendiz:</strong> </th>
                    <th scope="col"><strong>Generar Descargos:</strong> </th>
                </tr>
            </thead>
            <?php
        endif;
        ?>
        <tr>
            <td style="display:none;">
                <div class="mr-5" valor="<?=$valores->consecutivoAprendizReporte?>"> <?=$valores->consecutivoAprendizReporte?> </div>
            </td>
            <td  style="display:none;">
                <div class="mr-5" valor="<?=$valores->consReporte?>"> <?=$valores->consReporte?> </div>
            </td>
            <td>
                <div class="mr-5"> <?=$valores->docID?> </div>
            </td>
            <td>
                <div class="mr-5"><?=$valores->aprendiz?> </div>
            </td>
            <td>
                <button class="btn btn-warning descargos" value = "<?=$valores->consecutivoAprendizReporte?>">Descargos</button>
            </td>
        </tr>
        <?php
    endforeach;
    ?>
    </table>
    <?php 
endforeach;


/**
 * <div> <?=$valores->consecutivoAprendizReporte?> </div>
 * <div> <?=$valores->consReporte?> </div>
 */
?>