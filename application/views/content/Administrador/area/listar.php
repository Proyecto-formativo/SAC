<div class="container">
  <h2 class="text-center">Áreas</h2>
  <a href="<?= base_url('Administrador/FrmAgregarArea'); ?>" class="btn bg-sena mb-3">Agregar</a>

  <table id="area" class="table table-striped table-bordered" style="width: 100%;">
    <thead>
      <tr>
        <th>Codigo</th>
        <th>Área</th>
        <th>Centro</th>
        <th>Coordinador</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($areas->result() as $area) : ?>
        <tr>
          <td><?= $area->codigo; ?></td>
          <td><?= $area->nombre; ?></td>
          <td><?= $area->centro; ?></td>
          <td><?= $area->coordinador; ?></td>
          <td><a href="<?= base_url('Administrador/FrmEditarArea/' . $area->codigo); ?>" class="btn bg-sena">Editar</a></td>
          <td>
            <button type="button" class="btn btn-danger eliminarArea" data-toggle="modal">
              Eliminar
            </button>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<!-- Modal -->
<div class="modal fade" id="eliminarAreaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Área</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('Administrador/eliminarArea'); ?>" method="POST">
        <input type="hidden" id="codigo_area" name="codigo">
        <div class="modal-body">
          Esta seguro de eliminar el Área?
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