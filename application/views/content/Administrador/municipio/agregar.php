<div class="container">
  <h1 class="text-center">Agregar Municipio</h1>

  <form action="<?= base_url('Administrador/agregarMunicipio'); ?>" method="POST">
    <div class="form-group">
      <label for="">Codigo:</label>
      <input type="text" class="form-control" name="codigo" value="<?= set_value('codigo'); ?>" placeholder="Codigo">
      <?= form_error('codigo', '<p class="text-danger">', '</p>'); ?>
    </div>

    <div class="form-group">
      <label for="">Nombre:</label>
      <input type="text" class="form-control" name="nombre" value="<?= set_value('nombre'); ?>" placeholder="Nombre">
      <?= form_error('nombre', '<p class="text-danger">', '</p>'); ?>
    </div>

    <input type="submit" name="submit" class="btn bg-sena" value="Agregar">
  </form>
</div>

<a href="<?= base_url('Administrador/municipio'); ?>" class="btn bg-sena mt-3">Regresar Al Modulo Municipio</a>
