<div class="container">
  <h1 class="text-center">Aprendices Ficha</h1>
  <form action="<?= base_url('Administrador/editarAprendicesFicha'); ?>" method="POST">
    <table id="aprendicesfichas" class="table table-striped table-bordered mt-4" style="width: 100%;">
      <thead class="bg-sena">
        <tr>
          <th>Ficha</th>
          <th>Documento</th>
          <th>Aprendiz</th>
          <th>Estado</th>
          <th>Remover</th>
        </tr>  
      </thead>

      <tbody>
        <?php $i = 1; ?>
        <?php foreach($aprendicesficha->result() as $af) : ?>
          <tr>
            <td><?= $af->nroficha; ?><input type="hidden" name="ficha" value="<?= $af->nroficha; ?>"></td>
            <td><?= $af->documento; ?></td>
            <td><?= $af->aprendiz; ?></td>
            <td>
              <input type="hidden" name="documento[]" value="<?= $af->documento; ?>">
              <?php foreach($estadoaprendices->result() as $estadoaprendiz) : ?>
                <?php if ($estadoaprendiz->codigo == $af->codigoestado) : ?>
                  <div class="form-check">
                    <input type="radio" name="estado<?= $i; ?>" value="<?= $estadoaprendiz->codigo; ?>" class="form-check-input" checked="checked">
                    <label for="estado" class="form-check-label"><?= $estadoaprendiz->nombre; ?></label>
                  </div>
                <?php else : ?>
                  <div class="form-check">
                    <input type="radio" name="estado<?= $i?>" value="<?= $estadoaprendiz->codigo; ?>" class="form-check-input">
                    <label for="estado"><?= $estadoaprendiz->nombre; ?></label> 
                  </div>
                <?php endif; ?>
              <?php endforeach; ?>
            </td>
            <td>
              <button type="button" class="btn btn-danger removerAprendiz">Remover</button>
            </td>
          </tr>  
        <?php $i++; ?>  
        <?php endforeach; ?>
      </tbody>
    </table>
    <input type="hidden" name="num_aprendices" value="<?= $i; ?>">
    <input type="submit" class="btn bg-sena mt-2 mb-3" value="Guardar Cambios">
  </form>
  <a href="<?= base_url('Administrador/aprendicesficha'); ?>" class="btn bg-sena">Regresar al Modulo Aprendices Ficha</a>

</div>

<!-- Modal -->
<div class="modal fade" id="removerAprendicesFicha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remover Aprendiz</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('Administrador/eliminarAprendicesFicha'); ?>" method="POST">
        <input type="hidden" id="documento_aprendiz" name="documento">
        <input type="hidden" id="numFicha" name="ficha">
        <div class="modal-body">
          Esta seguro de remover al aprendiz de la ficha?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-sena" data-dismiss="modal">Cancelar</button>
          <button type="submit" name="eliminar" class="btn btn-danger">Remover</button>
        </div>
      </form>
    </div>
  </div>
</div>