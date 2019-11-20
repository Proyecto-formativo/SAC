<div class="container">
  <h1 class="text-center">Editar Estado Aprendiz</h1>

  <form action="<?= base_url('Administrador/editarEstadoAprendiz'); ?>" method="POST">
    <div class="form-group">
      <label for="">Codigo:</label>
      <input type="text" name="codigo" class="form-control" value="<?= $estadoAprendiz->codigo; ?>" readonly>
    </div>
    <div class="form-group">
      <label for="">Nombre:</label>
      <input type="text" name="nombre" class="form-control" value="<?= $estadoAprendiz->nombre; ?>">
      <?= form_error('nombre', '<p class="text-danger">', '</p>'); ?>
    </div>
    <input type="submit" name="submit" class="btn bg-sena" value="Editar">
  </form>

  <a href="<?= base_url('Administrador/estadoaprendiz'); ?>" class="btn bg-sena mt-3">Regresar al Modulo Estado Aprendiz</a>
</div>