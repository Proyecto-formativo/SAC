<div class="container">
  <h1 class="text-center">Agregar Sugerencia</h1>
  <form action="<?php echo base_url('Administrador/agregarSugerencia'); ?>" method="POST">
    <div class="form-group">
      <label for="">Sugerencia:</label>
      <input type="text" class="form-control" name="sugerencia" placeholder="Sugerencia" value="<?php echo set_value('sugerencia'); ?>">
      <?php echo form_error('sugerencia', '<p class="text-danger mt-2">', '</p>'); ?>
    </div>
    <input type="submit" name="agregar_sugerencia" class="btn bg-sena" value="Agregar">
  </form>
</div>

<a href="<?= base_url('Administrador/sugerencia'); ?>" class="btn bg-sena mt-3">Regresar Al Modulo Sugerencia</a>