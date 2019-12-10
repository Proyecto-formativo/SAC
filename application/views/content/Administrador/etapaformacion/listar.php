<div class="container">
  <h2 class="text-center">Etapa formación</h2>
  <a href="<?= base_url('Administrador/FrmAgregarEtapaFormacion'); ?>" class="btn bg-sena mb-3">Agregar</a>

  <table id="etapasformacion" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach($etapasformacion->result() as $etapaformacion) : ?>
        <tr>
          <td><?= $etapaformacion->codigo; ?></td>
          <td><?= $etapaformacion->nombre; ?></td>
          <td><a href="<?php echo base_url('Administrador/FrmEditarEtapaFormacion/' . $etapaformacion->codigo); ?>" class="btn bg-sena">Editar</a></td>
          <td>
            <button type="button" class="btn btn-danger eliminarEtapaFormacion" data-toggle="modal">
              Eliminar
            </button>
          </td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>

</div>

<!-- Modal -->
<div class="modal fade" id="eliminarEtapaFormacionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Etapa Proyecto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('Administrador/eliminarEtapaFormacion'); ?>" method="POST">
        <input type="hidden" id="codigo_etapaformacion" name="codigo">
        <div class="modal-body">
          Esta seguro de eliminar esta Etapa Formación?
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