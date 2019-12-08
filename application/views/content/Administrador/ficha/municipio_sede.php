<div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Municipio:</label>
          <select name="municipio" class="form-control">
            
          </select>
          <?= form_error('municipio', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="">Sede:</label>
          <select name="sede" class="form-control">
            <?php foreach($sedes->result() as $sede) : ?>
              <option value="<?= $sede->codigo; ?>"><?= $sede->codigo; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

    </div>