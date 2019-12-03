<div class="container">
  <h1 class="text-center">Agregar Centro</h1>

  <form action="<?= base_url('Administrador/agregarCentro'); ?>" method="POST">
    
    <div class="form-group">
      <label for="">Codigo:</label>
      <input type="text" name="codigo" class="form-control" value="<?= set_value('codigo'); ?>" placeholder="Codigo">
      <?= form_error('codigo', '<p class="text-danger">', '</p>'); ?>
    </div>

    <div class="form-group">
      <label for="">Nombre:</label>
      <input type="text" name="nombre" class="form-control" value="<?= set_value('nombre'); ?>" placeholder="Nombre">
      <?= form_error('nombre', '<p class="text-danger">', '</p>'); ?>
    </div>
    <input type="submit" name="submit" class="btn bg-sena" value="Agregar">
  </form>

  <a href="<?= base_url('Administrador/centros'); ?>" class="btn bg-sena mt-3">Regresar al Modulo Centro</a>
</div>