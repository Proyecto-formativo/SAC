<div class="container">
  <h1 class="text-center">Editar Instructor</h1>

  <form action="<?= base_url('Administrador/editarInstructor'); ?>" method="POST">

    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Documento de Identidad:</label>
          <input type="text" name="docid" class="form-control" placeholder="Documento Identidad" value="<?= $instructor->documento; ?>" id="docid" readonly>
          <?= form_error('docid', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="">Nombres:</label>
          <input type="text" name="nombres" class="form-control" placeholder="Nombres" value="<?= $instructor->nombres; ?>">
          <?= form_error('nombres', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Apellidos:</label>
          <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" value="<?= $instructor->apellidos; ?>">
          <?= form_error('apellidos', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="">Correo Personal:</label>
          <input type="text" name="correo_personal" class="form-control" placeholder="Correo Personal" value="<?= $instructor->correopersonal; ?>">
          <?= form_error('correo_personal', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Correo Corporativo:</label>
          <input type="text" name="correo_corporativo" class="form-control" placeholder="Correo Corporativo" value="<?= $instructor->correocorporativo; ?>">
          <?= form_error('correo_corporativo', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="">Telefono Movil:</label>
          <input type="text" name="tel_movil" class="form-control" placeholder="Telefono Movil" value="<?= $instructor->telmovil; ?>">
          <?= form_error('tel_movil', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Telefono Fijo:</label>
          <input type="text" name="tel_fijo" class="form-control" placeholder="Telefono Fijo" value="<?= $instructor->telfijo; ?>">
          <?= form_error('tel_fijo', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="">Perfil:</label>
          <select name="perfil" class="form-control">
            <?php foreach ($perfiles->result() as $perfil) : ?>
              <?php if ($perfil->codigo == $instructor->perfil) : ?>
                <option value="<?= $perfil->codigo; ?>" selected><?= $perfil->nombre; ?></option>
              <?php else : ?>
                <option value="<?= $perfil->codigo; ?>"><?= $perfil->nombre; ?></option>
              <?php endif; ?>    
            <?php endforeach; ?>
          </select>
        </div>
      </div>
    </div>

    <input type="submit" class="btn bg-sena mt-2" value="Guardar cambios">
  </form>

  <?php if($acceso) : ?>
    <div class="mt-3">
      <button type="button" class="btn btn-danger" id="denegar">Denegar Acceso</button>
    </div>
  <?php else : ?>
    <div class="mt-3">
      <p class="alert alert-info">Este Usuario no tiene acceso a la plataforma, llene el formulario de abajo para brindarle acceso</p>
      <form action="<?= base_url('Administrador/darAccesoInstructor'); ?>" method="POST">
        <input type="hidden" name="documento" value="<?= $instructor->documento; ?>">
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="">Contraseña de acceso:</label>
              <input type="password" name="password_one" placeholder="Contraseña" class="form-control" value="<?= set_value('password_one'); ?>">
              <?= form_error('password_one', '<p class="text-danger">', '</p>'); ?>
            </div>
          </div>

          <div class="col-6">
            <div class="form-group">
              <label for="">Confirmar Contraseña:</label>
              <input type="password" name="password_two" placeholder="Confirmar contraseña" class="form-control" value="<?= set_value('password_two'); ?>">
              <?= form_error('password_two', '<p class="text-danger">', '</p>'); ?>
            </div>
          </div>
        </div>

        <input type="submit" name="editar" class="btn btn-block bg-sena" value="Guardar contraseña">
      </form>
    </div>
  <?php endif; ?>

  <a href="<?= base_url('Administrador/instructores'); ?>" class="btn bg-sena mt-3">Regresar Al Modulo Instructor</a>
</div>

<!-- Ventana Modal para Denegar el Acceso -->
<div class="modal fade" id="denegarAccesoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Denegar Acceso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('Administrador/denegarAccesoInstructor'); ?>" method="POST">
        <input type="hidden" id="documento_usuario" name="documento">
        <div class="modal-body">
          Esta seguro de denegarle el acceso a este Usuario?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-sena" data-dismiss="modal">Cancelar</button>
          <button type="submit" name="eliminar" class="btn btn-danger">Aceptar</button>
        </div>
      </form>
    </div>
  </div>
</div>