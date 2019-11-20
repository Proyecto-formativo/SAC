<div class="container">
  <h1 class="text-center">Editar Estado Instructor</h1>

  <form action="<?= base_url('Administrador/editarEstadoInstructor'); ?>" method="POST">
    <div class="form-group">
      <label for="">Codigo:</label>
      <input type="text" name="codigo" class="form-control" value="<?= $estadoInstructor->codigo; ?>" readonly>
    </div>
    <div class="form-group">
      <label for="">Nombre:</label>
      <input type="text" name="nombre" class="form-control" value="<?= $estadoInstructor->nombre; ?>">
      <?= form_error('nombre', '<p class="text-danger">', '</p>'); ?>
    </div>
    <input type="submit" name="submit" class="btn bg-sena" value="Editar">
  </form>

  <a href="<?= base_url('Administrador/estadoinstructor'); ?>" class="btn bg-sena mt-3">Regresar al Modulo Estado Instructor</a>
</div>