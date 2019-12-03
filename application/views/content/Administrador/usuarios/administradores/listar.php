<div class="container">
  <h2 class="text-center">Administradores</h2>
  <a href="<?= base_url('Administrador/FrmAgregarAdministrador'); ?>" class="btn bg-sena mb-3">Agregar</a>
  <div class="table-responsive">
    <table id="administradores" class="table table-striped table-bordered" style="width: 100%;">
      <thead>
        <tr>
          <th>Documento</th>
          <th>Nombre Completo</th>
          <th>Correo Personal</th>
          <th>Correo Corporativo</th>
          <th>Tel. Movil</th>
          <th>Tel. Fijo</th>
          <th>Perfil</th>
          <th>Acceso</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($administradores->result() as $administrador) : ?>
          <tr>
            <td><?= $administrador->documento; ?></td>
            <td><?= $administrador->usuario; ?></td>
            <td><?= $administrador->correopersonal; ?></td>
            <td><?= $administrador->correocorporativo; ?></td>
            <td><?= $administrador->telmovil; ?></td>
            <td><?= $administrador->telfijo; ?></td>
            <td><?= $administrador->perfil; ?></td>
            <?php if ($administrador->docidusuario == null) : ?>
              <td class="text-danger">Sin Acceso</td>
            <?php else : ?>
              <td class="text-success">Con Acceso</td>
            <?php endif; ?>  
            <td><a href="<?= base_url('Administrador/FrmEditarAdministrador/' . $administrador->documento); ?>" class="btn bg-sena">Editar</a></td>
            <td>
              <button type="button" class="btn btn-danger eliminarAdministrador" data-toggle="modal">
                Eliminar
              </button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="eliminarAdministradorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('Administrador/eliminarUsuario'); ?>" method="POST">
        <input type="hidden" id="documento_administrador" name="documento">
        <div class="modal-body">
          Esta seguro de eliminar este Usuario?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-sena" data-dismiss="modal">Cancelar</button>
          <button type="submit" name="eliminar" class="btn btn-danger">Eliminar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  <?= isset($mensaje) ? $mensaje : "" ;?>
</script>