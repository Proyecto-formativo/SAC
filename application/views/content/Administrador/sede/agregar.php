<div class="container">
  <h1 class="text-center">Agregar Sede</h1>

  <form action="<?= base_url('Administrador/agregarSede'); ?>" method="POST">
    
    <div class="form-group">
      <label for="">Codigo:</label>
      <input type="text" name="codigo" class="form-control" value="<?= set_value('codigo'); ?>">
      <?= form_error('codigo', '<p class="text-danger">', '</p>'); ?>
    </div>

    <div class="form-group">
      <label for="">Sede:</label>
      <input type="text" name="nombre" class="form-control" value="<?= set_value('nombre'); ?>">
      <?= form_error('nombre', '<p class="text-danger">', '</p>'); ?>
    </div>

    <div class="form-group">
      <label for="">Centro:</label>
      <select name="centro" class="form-control">
        <?php foreach($centros->result() as $centro) : ?>
          <option value="<?= $centro->codigo; ?>"><?= $centro->nombre; ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <input type="submit" name="submit" class="btn bg-sena" value="Agregar">
  </form>

  <a href="<?= base_url('Administrador/sedes'); ?>" class="btn bg-sena mt-3">Regresar al Modulo Sede</a>
</div>