<div class="container">
  <h1 class="text-center">Editar Sede</h1>

  <form action="<?= base_url('Administrador/editarSede'); ?>" method="POST">
    
    <div class="form-group">
      <label for="">Codigo:</label>
      <input type="text" name="codigo" class="form-control" value="<?= $sede->codigo; ?>" readonly>
      <?= form_error('codigo', '<p class="text-danger">', '</p>'); ?>
    </div>

    <div class="form-group">
      <label for="">Sede:</label>
      <input type="text" name="nombre" class="form-control" value="<?= $sede->nombre; ?>">
      <?= form_error('nombre', '<p class="text-danger">', '</p>'); ?>
    </div>

    <div class="form-group">
      <label for="">Centro:</label>
      <select name="centro" class="form-control">
        <?php foreach($centros->result() as $centro) : ?>
          <?php if ($centro->codigo == $sede->codigo_centro) : ?>
            <option value="<?= $centro->codigo; ?>" selected><?= $centro->nombre; ?></option>
          <?php else : ?>
            <option value="<?= $centro->codigo; ?>"><?= $centro->nombre; ?></option>
          <?php endif;?>
        <?php endforeach; ?>
      </select>
    </div>
    <input type="submit" name="submit" class="btn bg-sena" value="Editar">
  </form>

  <a href="<?= base_url('Administrador/sedes'); ?>" class="btn bg-sena mt-3">Regresar al Modulo Sede</a>
</div>