<div class="container">
  <h1 class="text-center">Agregar Recomendación</h1>

  <form action="<?= base_url('Administrador/agregarRecomendacion'); ?>" method="POST">
    <div class="form-group">
      <label for="">Recomendación:</label>
      <input type="text" name="recomendacion" class="form-control" value="<?= set_value('recomendacion'); ?>">
      <?= form_error('recomendacion', '<p class="text-danger mt-2">', '</p>'); ?>
    </div>
    <input type="submit" name="submit" class="btn bg-sena" value="Agregar">
  </form>
</div>

<a href="<?= base_url('Administrador/recomendacion'); ?>" class="btn bg-sena mt-3">Regresar Al Modulo Recomendación</a>