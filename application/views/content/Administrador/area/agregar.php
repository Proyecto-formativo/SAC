<div class="container">
  <h1 class="text-center">Agregar Área</h1>

  <form action="<?= base_url('Administrador/agregarArea'); ?>" method="POST">
    
    

    

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
          <label for="">Nombre:</label>
          <input type="text" name="nombre" class="form-control" value="<?= set_value('nombre'); ?>" placeholder="Nombre">
          <?= form_error('nombre', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>
    </div>

    <div class="row">
      
      <div class="col-6">
        <div class="form-group">
          <label for="">Coordinador:</label>
          <select name="coordinador" class="form-control">
            <?php foreach($coordinadores->result() as $coordinador) : ?>
              <option value="<?= $coordinador->documento; ?>" <?= set_select('coordinador', $coordinador->documento); ?>><?= $coordinador->coordinador; ?></option>
            <?php endforeach; ?>
          </select>
        </div>       
      </div>
    </div>

    <input type="submit" name="submit" class="btn bg-sena" value="Agregar">
  </form>

  <a href="<?= base_url('Administrador/areas'); ?>" class="btn bg-sena mt-3">Regresar al Modulo Área</a>
</div>