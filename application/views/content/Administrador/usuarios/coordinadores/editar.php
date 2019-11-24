<div class="container">
  <h1 class="text-center">Editar Coordinador</h1>

  <form action="<?= base_url('Administrador/editarCoordinador'); ?>" method="POST">

    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Documento de Identidad:</label>
          <input type="text" name="docid" class="form-control" placeholder="Documento Identidad" value="<?= $coordinador->documento; ?>" readonly>
          <?= form_error('docid', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="">Nombres:</label>
          <input type="text" name="nombres" class="form-control" placeholder="Nombres" value="<?= $coordinador->nombres; ?>">
          <?= form_error('nombres', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Apellidos:</label>
          <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" value="<?= $coordinador->apellidos; ?>">
          <?= form_error('apellidos', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="">Correo Personal:</label>
          <input type="text" name="correo_personal" class="form-control" placeholder="Correo Personal" value="<?= $coordinador->correopersonal; ?>">
          <?= form_error('correo_personal', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Correo Corporativo:</label>
          <input type="text" name="correo_corporativo" class="form-control" placeholder="Correo Corporativo" value="<?= $coordinador->correocorporativo; ?>">
          <?= form_error('correo_corporativo', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="">Telefono Movil:</label>
          <input type="text" name="tel_movil" class="form-control" placeholder="Telefono Movil" value="<?= $coordinador->telmovil; ?>">
          <?= form_error('tel_movil', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>

    </div>

    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Telefono Fijo:</label>
          <input type="text" name="tel_fijo" class="form-control" placeholder="Telefono Fijo" value="<?= $coordinador->telfijo; ?>">
          <?= form_error('tel_fijo', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="">Perfil:</label>
          <select name="perfil" class="form-control">
            <?php foreach ($perfiles->result() as $perfil) : ?>
              <?php if ($perfil->codigo == $coordinador->perfil) : ?>
                <option value="<?= $perfil->codigo; ?>" selected><?= $perfil->nombre; ?></option>
              <?php else : ?>
                <option value="<?= $perfil->codigo; ?>"><?= $perfil->nombre; ?></option>
              <?php endif; ?>    
            <?php endforeach; ?>
          </select>
        </div>
      </div>
    </div>

    <input type="submit" class="btn bg-sena mt-2" value="Editar">
  </form>

  <a href="<?= base_url('Administrador/coordinadores'); ?>" class="btn bg-sena mt-3">Regresar Al Modulo Coordinador</a>
</div>