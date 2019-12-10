<div class="container">

  <h1 class="text-center">Editar Recomendación</h1>
  
  <form action="<?= base_url('Administrador/editarRecomendacion'); ?>" method="POST">
    <div class="form-group">
      <label for="">Codigo:</label>
      <input type="text" name="codigo" class="form-control" value="<?= $recomendacion->codigo; ?>" readonly>
    </div>
    
    <div class="form-group">
      <label for="">Recomendación:</label>
      <input type="text" name="recomendacion" class="form-control" value="<?= $recomendacion->nombre; ?>">
      <?= form_error('recomendacion', '<p class="text-danger mt-2">', '</p>'); ?>
    </div>
    <input type="submit" name="editar" class="btn bg-sena" value="Guardar cambios">
  </form>
</div>

<a href="<?= base_url('Administrador/recomendacion'); ?>" class="btn bg-sena mt-3">Regresar Al Modulo Recomendación</a>