<div class="container">
  <h1 class="text-center">Equipo Instructores</h1>
  <form action="<?= base_url('Administrador/editarInstructorFicha'); ?>" method="POST">
    <table id="equipo_instructores_ficha" class="table table-striped table-bordered mt-4" style="width: 100%;">
      <thead class="bg-sena">
        <tr>
          <th>Ficha</th>
          <th>Documento</th>
          <th>Instructor</th>
          <th>Estado</th>
          <th>Remover</th>
        </tr>  
      </thead>

      <tbody>
        <?php $i = 1; ?>
        <?php foreach($equipoinstructores->result() as $ei) : ?>
          <tr>
            <td><?= $ei->nroficha; ?><input type="hidden" name="ficha" value="<?= $ei->nroficha; ?>"></td>
            <td><?= $ei->documento; ?></td>
            <td><?= $ei->instructor; ?></td>
            <td>
              <input type="hidden" name="documento[]" value="<?= $ei->documento; ?>">
              <?php foreach($estadoinstructores->result() as $estadoinstructor) : ?>
                <?php if($estadoinstructor->codigo == $ei->codigo_estado) : ?>
                  <div class="form-check">
                    <input type="radio" name="estado<?= $i?>" value="<?= $estadoinstructor->codigo; ?>" class="form-check-input" checked="checked">
                    <label for="estado" class="form-check-label"><?= $estadoinstructor->nombre; ?></label>
                  </div>
                <?php else : ?>
                  <div class="form-check">
                    <input type="radio" name="estado<?= $i?>" value="<?= $estadoinstructor->codigo; ?>" class="form-check-input">
                    <label for="estado"><?= $estadoinstructor->nombre; ?></label> 
                  </div>
                <?php endif; ?>

              <?php endforeach; ?> 
            </td>
            <td>
              <button type="button" class="btn btn-danger removerInstructor">Remover</button>
            </td>
          </tr>  
        <?php $i++; ?>  
        <?php endforeach; ?>
      </tbody>
    </table>
    <input type="hidden" name="num_instructores" value="<?= $i; ?>">
    <input type="submit" class="btn bg-sena mt-2 mb-3" value="Guardar cambios">
  </form>                  
  <a href="<?= base_url('Administrador/equipoinstructores'); ?>" class="btn bg-sena">Regresar al Modulo Equipo Instructores</a>
</div>

<!-- Modal -->
<div class="modal fade" id="removerEquipoInstructor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remover Instructor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('Administrador/eliminarInstructorFicha'); ?>" method="POST">
        <input type="hidden" id="documento_instructor" name="documento">
        <input type="hidden" id="numFicha" name="ficha">
        <div class="modal-body">
          Esta seguro de remover al instructor de la ficha?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-sena" data-dismiss="modal">Cancelar</button>
          <button type="submit" name="eliminar" class="btn btn-danger">Remover</button>
        </div>
      </form>
    </div>
  </div>
</div>