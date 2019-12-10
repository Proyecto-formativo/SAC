<div class="container">
  <h1 class="text-center">Agregar Programa</h1>

  <form action="<?= base_url('Administrador/agregarPrograma'); ?>" method="POST">

    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Codigo:</label>
          <input type="text" name="codigo" class="form-control" value="<?= set_value('codigo'); ?>" placeholder="Codigo">
          <?= form_error('codigo', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="">Programa:</label>
          <input type="text" name="nombre" class="form-control" value="<?= set_value('nombre'); ?>" placeholder="Programa">
          <?= form_error('nombre', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Nivel:</label>
          <select name="nivel" class="form-control">
            <?php foreach($niveles->result() as $nivel) : ?>
              <option value="<?= $nivel->codigo; ?>" <?= set_select('nivel', $nivel->codigo); ?>> <?= $nivel->nombre; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="">Área:</label>
          <select name="area" class="form-control">
            <?php foreach($areas->result() as $area) : ?>
              <option value="<?= $area->codigo; ?>" <?= set_select('area', $area->codigo); ?>><?= $area->nombre; ?></option>
            <?php endforeach; ?>
          </select>
        </div>      
      </div>
    </div>
    
    

    <div class="form-group">
      <label for="">Proyecto Formativo:</label>
      <textarea name="proyecto" cols="30" rows="3" class="form-control" placeholder="Proyecto formativo"><?= set_value('proyecto'); ?></textarea>
      <?= form_error('proyecto', '<p class="text-danger">', '</p>'); ?>
    </div>

    <input type="submit" name="submit" class="btn bg-sena" value="Agregar">
  </form>

  <a href="<?= base_url('Administrador/programas'); ?>" class="btn bg-sena mt-3">Regresar al Modulo Programa</a>
</div>