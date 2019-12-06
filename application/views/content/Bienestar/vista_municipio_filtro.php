<div class="row">
    <!-- centro -->
    <div class="col-6">
        <div class="form-group">
            <label for="centro">centro:</label>
            <select name="centro" class="form-control"  id="centro" >    
                <?php 
                if (isset($datos)):
                    foreach ($datos->result() as $valores):
                    if ($valores->centro != $verificacion) {
                        ?>
                            <option value="<?=$valores->codigo_centro?>"><?=$valores->centro?></option>     
                        <?php
                    }
                    $verificacion = $valores->centro;
                    endforeach;
                endif;
                ?>
            </select>
        </div>
    </div>


    <!-- Sede -->
    <div class="col-6">
        <div class="form-group">
            <label for="Sede">Sede:</label>
            <select name="sede" class="form-control"  id="sede" >
            <?php 
            if (isset($datos)):
                foreach ($datos->result() as $valores):
                   
                ?>
                <option value="<?=$valores->codigo_sede?>"><?=$valores->sede?></option>     
                <?php
                endforeach;


            endif;
            ?>
            </select>
        </div>
    </div>
</div>