<div class="container">
  <h2 class="text-center">Etapa proyecto</h2>
  <a href="<?= base_url('Administrador/FrmAgregarEtapaProyecto'); ?>" class="btn bg-sena mb-3">Agregar</a>

  <table id="etapasproyecto" class="table table-striped table-bordered" style="width: 100%;">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($etapasproyecto->result() as $etapaproyecto) : ?>
        <tr>
          <td><?= $etapaproyecto->nombre; ?></td>
          <td><a href="<?= base_url('Administrador/FrmEditarEtapaProyecto/' . $etapaproyecto->codigo); ?>" class="btn bg-sena">Editar</a></td>
          <td>
            <button type="button" class="btn btn-danger eliminarEtapaProyecto" data-toggle="modal">
              Eliminar
            </button>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<!-- Modal -->
<div class="modal fade" id="eliminarEtapaProyectoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Etapa Proyecto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('Administrador/eliminarEtapaProyecto'); ?>" method="POST">
        <input type="hidden" id="codigo_etapaproyecto" name="codigo">
        <div class="modal-body">
          Esta seguro de eliminar esta Etapa Proyecto?
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