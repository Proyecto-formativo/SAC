<div class="container">
  <h1 class="text-center">Editar Etapa Formación</h1>

  <form action="<?= base_url('Administrador/editarEtapaFormacion'); ?>" method="POST">
    <div class="form-group">
      <label for="">Codigo:</label>
      <input type="text" name="codigo" class="form-control" value="<?= $etapaformacion->codigo; ?>" readonly>
    </div>

    <div class="form-group">
      <label for="">Codigo:</label>
      <input type="text" name="nombre" class="form-control" value="<?= $etapaformacion->nombre; ?>">
      <?= form_error('nombre', '<p class="text-danger">', '</p>'); ?>
    </div>
    <input type="submit" name="submit" class="btn bg-sena" value="Editar">
  </form>

  <a href="<?= base_url('Administrador/etapaformacion')?>" class="btn bg-sena mt-3">Regresar al Modulo Etapa Formación</a>
</div>