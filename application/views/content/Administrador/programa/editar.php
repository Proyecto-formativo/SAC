<div class="container">
  <h1 class="text-center">Editar Programa</h1>

  <form action="<?= base_url('Administrador/editarPrograma'); ?>" method="POST">

    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Codigo:</label>
          <input type="text" name="codigo" class="form-control" value="<?= $programa->codigo ?>" readonly>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="">Programa:</label>
          <input type="text" name="nombre" class="form-control" value="<?= $programa->nombre; ?>">
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
              <?php if ($nivel->codigo == $programa->nivel) : ?>
                <option value="<?= $nivel->codigo; ?>" selected> <?= $nivel->nombre; ?></option>
              <?php else : ?>
                <option value="<?= $nivel->codigo; ?>" selected> <?= $nivel->nombre; ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="">Área:</label>
          <select name="area" class="form-control">
            <?php foreach($areas->result() as $area) : ?>
              <?php if ($nivel->area == $programa->area) : ?>
                <option value="<?= $area->codigo; ?>" selected><?= $area->nombre; ?></option>
              <?php else : ?>
                <option value="<?= $area->codigo; ?>"><?= $area->nombre; ?></option>
              <?php endif; ?>
            <?php endforeach; ?>
          </select>
        </div>      
      </div>
    </div>
    
    

    <div class="form-group">
      <label for="">Proyecto Formativo:</label>
      <textarea name="proyecto" cols="30" rows="3" class="form-control"><?= $programa->proyectoformativo; ?></textarea>
      <?= form_error('proyecto', '<p class="text-danger">', '</p>'); ?>
    </div>

    <input type="submit" name="submit" class="btn bg-sena" value="Editar">
  </form>

  <a href="<?= base_url('Administrador/programas'); ?>" class="btn bg-sena mt-3">Regresar al Modulo Programa</a>
</div>