<div class="container">
  <h1>Editar Sugerencia</h1>
  <form action="<?php echo base_url('Administrador/editarSugerencia'); ?>" method="POST">
    <input type="hidden" name="codigo" value="<?= $sugerencia->codigo; ?>">
    <div class="form-group">
      <label for="">Sugerencia:</label>
      <input type="text" class="form-control" name="sugerencia" placeholder="Sugerencia..." value="<?= $sugerencia->nombre; ?>">
      <?php echo form_error('sugerencia', '<p class="text-danger mt-2">', '</p>'); ?>
    </div>
    <input type="submit" name="editar_sugerencia" class="btn bg-sena" value="Editar">
  </form>
</div>