<div class="container">
  <h2 class="text-center">Áreas por centro</h2>

  <form action="<?= base_url('Administrador/agregarAreasCentro'); ?>" method="POST">

    <div class="row">
      <div class="col-8">
        <div class="form-group">
          <label for="">Centro:</label>
          <select name="" id="selected_centro" class="form-control">
            <?php foreach($centros->result() as $centro) : ?>
              <option value="<?= $centro->codigo; ?>"><?= $centro->codigo .' - '. $centro->nombre; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-8">
        <div class="form-group">
          <label for="">Área:</label>
          <div class="d-flex">
            <select name="area" id="selected_area" class="form-control">
              <?php foreach($areas->result() as $area) : ?>
                <option value="<?= $area->codigo; ?>"><?= $area->nombre; ?></option>
              <?php endforeach; ?>
            </select>
            <button type="button" class="btn bg-sena ml-3" id="addAreaDetalle">Agregar</button>
          </div>
        </div>
      </div>

    </div>

    <table id="areascentro" class="table table-bordered table-striped table-hover mt-4">
    <thead class="bg-sena">
      <tr>
        <th>Centro</th>
        <th>Área</th>
        <th>Opción</th>
      </tr>
    </thead>

    <tbody></tbody>
  </table>

  <input type="submit" class="btn bg-sena" id="guardar_area" value="Guardar" disabled>
  </form>

  <a href="<?= base_url('Administrador/areas_centro'); ?>" class="btn bg-sena mt-3">Regresar al modulo Áreas por centro</a>

</div>

<script>
  <?= isset($mensaje) ? $mensaje : "" ;?>
</script>