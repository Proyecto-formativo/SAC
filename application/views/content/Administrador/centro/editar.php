<div class="container">
  <h1 class="text-center">Editar Centro</h1>

  <form action="<?= base_url('Administrador/editarCentro'); ?>" method="POST">
    <div class="form-group">
      <label for="">Codigo:</label>
      <input type="text" name="codigo" class="form-control" value="<?= $centro->codigo; ?>" readonly>
    </div>
    <div class="form-group">
      <label for="">Nombre:</label>
      <input type="text" name="nombre" class="form-control" value="<?= $centro->nombre; ?>">
      <?= form_error('nombre', '<p class="text-danger">', '</p>'); ?>
    </div>
    <input type="submit" name="submit" class="btn bg-sena" value="Guardar cambios">
  </form>

  <a href="<?= base_url('Administrador/centros'); ?>" class="btn bg-sena mt-3">Regresar al Modulo Centro</a>
</div>