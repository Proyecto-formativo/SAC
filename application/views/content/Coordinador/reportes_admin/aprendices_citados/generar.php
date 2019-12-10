<div class="container">
  <h1 class="text-center">Reportes de aprendices citados</h1>

  <form action="<?= base_url('Coordinador/rac_params'); ?>" method="POST" class="mt-4">
    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Fecha Inicio:</label>
          <input type="date" name="fecha_inicial" class="form-control">
          <?= form_error('fecha_inicial', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="">Fecha Fin:</label>
          <input type="date" name = "fecha_final" class="form-control">
          <?= form_error('fecha_final', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-4">
        <div class="form-group">
          <input type="submit" class="btn bg-sena btn-block" value="Generar Reporte">
        </div>
      </div>
    </div>
    
  </form>
</div>  