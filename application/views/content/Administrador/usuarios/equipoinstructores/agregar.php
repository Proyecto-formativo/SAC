<div class="container">
  <h1 class="text-center">Equipo Instructores Ficha</h1>

  <form action="<?= base_url('Administrador/agregarEquipoInstructores'); ?>" method="POST">

    <div class="row">
      <div class="col-8">
        <div class="form-group">
          <label for="">Nro. Ficha</label>
          <select name="fichas" id="nroficha" class="form-control select_fichas">
            <?php foreach($fichas->result() as $ficha) : ?>
              <option value="<?= $ficha->nroficha; ?>"><?= $ficha->nroficha . ' - '. $ficha->programa; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
    </div>    

    <div class="row">
      <div class="col-8">
        <label for="">Instructores:</label>
        <div class="form-group">
          <div class="d-flex">
            <input type="hidden" name="documento_instructor" id="docid_instructor">  
            <input type="text" name="instructor" class="form-control" disabled id="campo_instructor">
            <button type="button" class="btn bg-sena" data-toggle="modal" data-target="#inst_detalle">Buscar</button>
            <button type="button" id="addInstructorDetalle" class="btn bg-sena ml-3">Agregar</button>
          </div>
        </div>
      </div>

      <div class="col-4">
        <div class="form-group">
          <label for="">Estado:</label>
          <select name="estado" id="estado_instructor" class="form-control">
            <?php foreach($estadoinstructores->result() as $estadoinstructor) : ?>
              <option value="<?= $estadoinstructor->codigo; ?>"><?= $estadoinstructor->nombre; ?></option>

            <?php endforeach; ?>
          </select>
        </div>
      </div>
    </div>

    <!-- tabla maestro detalle -->          
    <table class="table table-bordered table-striped table-hover mt-4" id="equipoinstructores">
      <thead class="bg-sena">
        <tr>
          <th>Documento</th>
          <th>Nombre Completo</th>
          <th>Ficha</th>
          <th>Estado</th>
          <th>Opción</th>
        </tr>
      </thead>

      <tbody></tbody>
    </table>

    <div class="form-group">
      <input type="submit" class="btn bg-sena" id="agregarEI" value="Guardar" disabled>          
    </div>                                      
    <!-- fin tabla maestro detalle --> 
  </form>

  <a href="<?= base_url('Administrador/equipoinstructores')?>" class="btn bg-sena mt-3">Regresar al modulo Equipo Instructores</a>
  
  <div class="row">
    <div class="col-3">
      <div class="form-group">
        <label for="">Nro. Ficha:</label>
        <input type="text" name="nroficha" id="buscar_ficha" class="form-control" placeholder="Buscar Ficha...">
      </div>
    </div>
  </div>
  
</div>


<div class="modal fade" id="inst_detalle">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Instructores</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          
          </div>
            <div class="modal-body">
              <table id="instructor_detalle" class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th>Documento</th>
                    <th>Nombre Completo</th>
                    <th>Opcion</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach ($instructores->result() as $instructor) : ?>
                      <tr>
                        <?php $datosinstructor = $instructor->documento."*".$instructor->instructor;?>  
                        <td><?= $instructor->documento; ?></td>
                        <td><?= $instructor->instructor; ?></td>
                        <td><button class="btn bg-sena addInstructor" value="<?= $datosinstructor; ?>">+</button></td>
                      </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>
          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
          </div>
      </div>
      <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
  <?= isset($mensaje) ? $mensaje : "" ;?>
</script>