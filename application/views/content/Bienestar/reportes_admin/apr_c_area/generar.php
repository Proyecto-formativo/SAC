<div class="container">
  <h1 class="text-center">Reporte aprendices citados por área</h1>

  <form action="<?= base_url('Bienestar/raca_param'); ?>" method="POST">
    <div class="row">
      <div class="col-6">
        <label for="">Área:</label>
        <select name="area" class="form-control">
          <?php foreach($areas->result() as $area) : ?>
            <option value="<?= $area->nombre; ?>"><?= $area->nombre; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-4">
        <div class="form-group">
          <input type="submit" name="generar" class="btn bg-sena btn-block mt-3" value="Generar Reporte">
        </div>
      </div>
    </div>
    
  </form>

</div>