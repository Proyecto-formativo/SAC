<div class="container">
  <a href="<?= base_url('Administrador/FrmAgregarRecomendacion'); ?>" class="btn bg-sena mb-3">Agregar</a>

  <table id="recomendacion" class="table table-striped table-bordered mt-3" style="width:100%">
    <thead>
      <tr>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach($recomendaciones->result() as $recomendacion) : ?>
        <tr>
          <td><?= $recomendacion->codigo; ?></td>
          <td><?= $recomendacion->nombre; ?></td>
          <td><a href="<?php echo base_url('Administrador/FrmEditarRecomendacion/' . $recomendacion->codigo); ?>" class="btn bg-sena">Editar</a></td>
          <td>
            <button type="button" class="btn btn-danger eliminarRecomendacion" data-toggle="modal">
              Eliminar
            </button>
          </td>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>

</div>

<!-- Modal -->
<div class="modal fade" id="eliminarRecomendacionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Recomendación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('Administrador/eliminarRecomendacion'); ?>" method="POST">
        <input type="hidden" id="codigo_recomendacion" name="codigo">
        <div class="modal-body">
          Esta seguro de eliminar esta Recomendación?
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