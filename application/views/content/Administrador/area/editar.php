<div class="container">
  <h1 class="text-center">Editar Área</h1>

  <form action="<?= base_url('Administrador/editarArea'); ?>" method="POST">
    
    <div class="form-group">
      <label for="">Codigo:</label>
      <input type="text" name="codigo" class="form-control" value="<?= $area->codigo; ?>" readonly>
    </div>

    <div class="form-group">
      <label for="">Nombre:</label>
      <input type="text" name="nombre" class="form-control" value="<?= $area->nombre; ?>">
      <?= form_error('nombre', '<p class="text-danger">', '</p>'); ?>
    </div>

    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Centro:</label>
            <select name="centro" class="form-control">
              <?php foreach($centros->result() as $centro) : ?>
                <?php if ($centro->codigo == $area->centro) : ?>
                  <option value="<?= $centro->codigo; ?>" selected><?= $centro->nombre; ?></option>
                <?php else : ?>
                  <option value="<?= $centro->codigo; ?>"><?= $centro->nombre; ?></option>
                <?php endif; ?>  
              <?php endforeach; ?>
            </select>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="">Coordinador:</label>
          <select name="coordinador" class="form-control">
            <?php foreach($coordinadores->result() as $coordinador) : ?>
              <?php if ($coordinador->documento == $area->docIDCoordinador) :?>
                <option value="<?= $coordinador->documento; ?>" selected><?= $coordinador->coordinador; ?></option>
              <?php else : ?>
                <option value="<?= $coordinador->documento; ?>"><?= $coordinador->coordinador; ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
        </div>       
      </div>
    </div>

    <input type="submit" name="submit" class="btn bg-sena" value="Guardar cambios">
  </form>

  <a href="<?= base_url('Administrador/areas'); ?>" class="btn bg-sena mt-3">Regresar al Modulo Área</a>
</div>