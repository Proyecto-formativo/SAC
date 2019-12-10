<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="area">Area:</label>
            <input type="text" class="form-control" id="area" disabled required value="<?=$datosFicha->area?>">
        </div>
    </div>

    <div class="col-6">

        <div class="form-group">
            <label for="nivel">Nivel:</label>
            <input type="text" class="form-control" id="nivel" disabled required value="<?=$datosFicha->nivel?>">
        </div>
    </div>

</div>

<div class="row">
    <!-- ETAPA FORMATIVA Y SUS DIFERENTES ETAPAS -->
    <div class="col-6">
        <div class="form-group">
            <label for="etapa-formativa">Etapa formativa:</label>
            <select name="etapaformacion" class="form-control"  id="etapa-formativa" >
            <?php   
                foreach ($etapaformacion->result() as $row){
                    if ($datosFicha->etaformacion == $row->nombre) {
                        ?>
                            <option value="<?=$row->codigo?>" selected><?=$datosFicha->etaformacion?></option>
                        <?php
                    }else{
                        ?>
                            <option value="<?=$row->codigo?>"><?=$row->nombre?></option>
                        <?php
                    }
                }
            ?>
            </select>
        </div>
    </div>



    <!-- ETAPA PROYECTO Y SUS DIFERENTES ETAPAS -->
    <div class="col-6">
    <div class="form-group">
            <label for="programa">Programa:</label>
            <input type="text" class="form-control" id="programa" disabled required value="<?=$datosFicha->programa?>">                       
        </div>

    </div>
</div>


<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="hora-inicio">Hora inicio:</label>
            <input type="text" class="form-control" id="hora-inicio"required disabled value="<?=$datosFicha->horai?>">
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="hora-final">Hora fin:</label>
            <input type="text" class="form-control" id="hora-final"required disabled value="<?=$datosFicha->horaf?>" >
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
    <div class="form-group">
            <label for="municipio">Municipio:</label>
            <input type="text" class="form-control" id="muncipio" disabled required value="<?=$datosFicha->municipio?>">
        </div>



    </div>

    <div class="col-6">
        <div class="form-group">
            <label for="etapa-proyecto">Etapa proyecto:</label>
            <select name="etapaproyecto" class="form-control"  id="etapa-proyecto" required>
            <?php   
                foreach ($etapaproyecto->result() as $row){
                    if ($datosFicha->etaformacion == $row->nombre) {
                        ?>
                            <option value="<?=$row->codigo?>" selected><?=$datosFicha->etaformacion?></option>
                        <?php
                    }else{
                        ?>
                            <option value="<?=$row->codigo?>"><?=$row->nombre?></option>
                        <?php
                    }
                }
            ?>
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="formativo">Proyecto formativo:</label>
            <input type="text" class="form-control" id="formativo" disabled required value="<?=$datosFicha->proformativo?>">
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="instructor-lider">Instructor lider:</label>
            <input type="text" class="form-control" id="instructor-lider" disabled required value="<?=$datosFicha->lider?>">
        </div>
    
    </div>

</div>


<div class="row">
    

    <div class="col-6">
    
        <div class="form-group">
            <label for="coordinador">Coordinador:</label>
            <input type="text" class="form-control" id="coordinador" disabled required value="<?=$datosFicha->NombreCoordinador?>">
            <input type="hidden" name="codigocoordinador" value="<?=$datosFicha->CodigoCoordinador?>">
        </div>
    
    </div>

    <div class="col-6">
    
        <div class="form-group">
            <label for="tipofalta">Tipo de falta:</label>
            <select name="tipofalta" class="form-control"  id="tipofalta" required>
                <option value="Academica">Academica</option>
                <option value="Diciplinaria">Diciplinaria</option>
            </select>                    
        </div>
    
    </div>
</div> 


<div class="row">
    <!-- justificacion-->
    <div class="col-6">
        <div class="form-group">
            <label for="justificacion">Justificacion:</label>
            <textarea class="form-control style-textareaficha" name="justificacion" id="justificacion" rows="3"required ></textarea>
        </div>
    </div>



    <!-- tipocalificacion -->
    <div class="col-6">
    <div class="form-group">
            <label for="tipocalifica">Tipo de Calificacion:</label>
            <select name="tipocalificacion" class="form-control"  id="tipocalifica" required>
                <option value="leve">Leve</option>
                <option value="Grave">Grave</option>
                <option value="Gravisima">Gravisima</option>
            </select>                    
        </div>
    </div>
</div> 

    <!-- evidencia -->
<div class="row">
    <div class="col-6">
        <div class="container">
            <label for="">Aprendices:</label>
            <?php 
               foreach ($AprendicesDelNumeroFicha->result() as $row):
                
                ?>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="<?=$row->nombres.' '.$row->apellidos?>" name="aprendices[]"  value="<?=$row->docId?>">
                        <label class="custom-control-label" for="<?=$row->nombres.' '.$row->apellidos?>"> <?=$row->nombres.' '.$row->apellidos?></label>
                    </div>
                <?php
               endforeach;
            ?>
        </div>
    </div>


    <div class="col-6">
         <!-- sugerencia -->
        <div class="col-12">
            <div class="form-group">
                <label for="Sugerencia">Sugerencia:</label>
                <select name="sugerencia" class="form-control"  id="Sugerencia" >
                    <?php
                        foreach ($sugerencia->result() as $row):
                            ?>
                                <option value="<?=$row->codigo?>"><?=$row->nombre?></option>
                            <?php
                        endforeach;
                    ?>
                </select>
            </div>
        </div>
        <!-- evidencia -->
        <div class="col-12">
            <div class="form-group">
                <label for="evidencia">Evidencia:</label>
                <input type="file" name="evidencia" class="form-control-file" id="evidencia" required accept=".pdf ,.jpg ,.png ,.doc,.docx,.txt">
            </div>
        </div>

        <!-- normas reglamentarias -->
        <div class="col-12">
            <div class="form-group">
                <label for="normasReglamentarias">Normas reglamentarias:</label>
                <textarea class="form-control style-textareaficha" name="normasReglamentarias" id="normasReglamentarias" rows="3" required></textarea>
            </div>
        </div>
    </div>
</div>

<div class="w-100 d-flex justify-content-center">
    <button type="submit" class="btn btn-primary ">Enviar</button>
</div>