<div class="container">
  <h1 class="text-center">Agregar Estado Instructor</h1>

  <form action="<?= base_url('Administrador/agregarEstadoInstructor'); ?>" method="POST">
    <div class="form-group">
      <label for="">Nombre:</label>
      <input type="text" name="nombre" class="form-control" value="<?= set_value('nombre'); ?>">
      <?= form_error('nombre', '<p class="text-danger">', '</p>'); ?>
    </div>
    <input type="submit" name="submit" class="btn bg-sena" value="Agregar">
  </form>

  <a href="<?= base_url('Administrador/estadoinstructor'); ?>" class="btn bg-sena mt-3">Regresar al Modulo Estado Instructor</a>
</div>