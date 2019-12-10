<div class="container">
  <h1 class="text-center">Agregar Coordinador</h1>

  <form action="<?= base_url('Administrador/agregarCoordinador'); ?>" method="POST">

    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Documento de Identidad:</label>
          <input type="text" name="docid" class="form-control" placeholder="Documento Identidad" value="<?= set_value('docid'); ?>">
          <?= form_error('docid', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="">Nombres:</label>
          <input type="text" name="nombres" class="form-control" placeholder="Nombres" value="<?= set_value('nombres'); ?>">
          <?= form_error('nombres', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Apellidos:</label>
          <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" value="<?= set_value('apellidos'); ?>">
          <?= form_error('apellidos', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="">Correo Personal:</label>
          <input type="text" name="correo_personal" class="form-control" placeholder="Correo Personal" value="<?= set_value('correo_personal'); ?>">
          <?= form_error('correo_personal', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Correo Corporativo:</label>
          <input type="text" name="correo_corporativo" class="form-control" placeholder="Correo Corporativo" value="<?= set_value('correo_corporativo'); ?>">
          <?= form_error('correo_corporativo', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>

      <div class="col-3">
        <div class="form-group">
          <label for="">Telefono Movil:</label>
          <input type="text" name="tel_movil" class="form-control" placeholder="Telefono Movil" value="<?= set_value('tel_movil'); ?>">
          <?= form_error('tel_movil', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>

      <div class="col-3">
        <div class="form-group">
          <label for="">Telefono Fijo:</label>
          <input type="text" name="tel_fijo" class="form-control" placeholder="Telefono Fijo" value="<?= set_value('tel_fijo'); ?>">
          <?= form_error('tel_fijo', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-6">
        <label for="">Contraseña de acceso:</label>
        <input type="password" name="password_one" class="form-control" placeholder="Contraseña" value="<?= set_value('password_one'); ?>">
        <?= form_error('password_one', '<p class="text-danger">', '</p>'); ?>
      </div>

      <div class="col-6">
        <label for="">Confirmar Contraseña:</label>
        <input type="password" name="password_two" class="form-control" placeholder="Confirmar contraseña" value="<?= set_value('password_two'); ?>">
        <?= form_error('password_two', '<p class="text-danger">', '</p>'); ?>
      </div>
    </div>

    <input type="submit" class="btn bg-sena mt-2" value="Agregar">
  </form>

  <a href="<?= base_url('Administrador/coordinadores'); ?>" class="btn bg-sena mt-3">Regresar Al Modulo Coordinador</a>
</div>