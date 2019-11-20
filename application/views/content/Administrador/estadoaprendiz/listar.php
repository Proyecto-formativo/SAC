<div class="container">
  <a href="<?= base_url('Administrador/FrmAgregarEstadoAprendiz'); ?>" class="btn bg-sena">Agregar</a>

  <table id="estadoaprendiz" class="table table-striped table-bordered mt-3" style="width: 100%;">
    <thead>
      <tr>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($estadoAprendices->result() as $estadoAprendiz) : ?>
        <tr>
          <td><?= $estadoAprendiz->codigo; ?></td>
          <td><?= $estadoAprendiz->nombre; ?></td>
          <td><a href="<?= base_url('Administrador/FrmEditarEstadoAprendiz/' . $estadoAprendiz->codigo); ?>" class="btn bg-sena">Editar</a></td>
          <td>
            <button type="button" class="btn btn-danger eliminarEstadoAprendiz" data-toggle="modal">
              Eliminar
            </button>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<!-- Modal -->
<div class="modal fade" id="eliminarEstadoAprendizModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Estado Aprendiz</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('Administrador/eliminarEstadoAprendiz'); ?>" method="POST">
        <input type="hidden" id="codigo_estadoaprendiz" name="codigo">
        <div class="modal-body">
          Esta seguro de eliminar el Estado del Aprendiz?
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