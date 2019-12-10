<div class="form-group">
  <label for="">Sede:</label>
  <select name="sede" class="form-control">
    <option value="0" <?= set_select('sede', '0'); ?>>Seleccione una sede</option>
    <?php foreach($sedes->result() as $sede) : ?>
      <option value="<?= $sede->codigo; ?>" <?= set_select('sede', $sede->codigo); ?>><?= $sede->sede; ?></option>
    <?php endforeach; ?>
  </select>
</div>