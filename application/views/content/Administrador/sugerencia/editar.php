<div class="container">
  <h1 class="text-center">Editar Sugerencia</h1>
  <form action="<?php echo base_url('Administrador/editarSugerencia'); ?>" method="POST">
    <div class="form-group">
      <label for="">Codigo:</label>
      <input type="text" name="codigo" class="form-control" value="<?= $sugerencia->codigo; ?>" readonly>
    </div>
    
    <div class="form-group">
      <label for="">Sugerencia:</label>
      <input type="text" class="form-control" name="sugerencia" placeholder="Sugerencia..." value="<?= $sugerencia->nombre; ?>">
      <?php echo form_error('sugerencia', '<p class="text-danger mt-2">', '</p>'); ?>
    </div>
    <input type="submit" name="editar_sugerencia" class="btn bg-sena" value="Guardar cambios">
  </form>
</div>

<a href="<?= base_url('Administrador/sugerencia'); ?>" class="btn bg-sena mt-3">Regresar Al Modulo Sugerencia</a>