<div class="container">
  <h2 class="text-center">Sedes</h2>
  <a href="<?= base_url('Administrador/FrmAgregarSede'); ?>" class="btn bg-sena mb-3">Agregar</a>

  <table id="sede" class="table table-striped table-bordered" style="width: 100%;">
    <thead>
      <tr>
        <th>Codigo</th>
        <th>Sede</th>
        <th>Centro</th>
        <th>Municipio</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($sedes->result() as $sede) : ?>
        <tr>
          <td><?= $sede->codigo; ?></td>
          <td><?= $sede->nombre; ?></td>
          <td><?= $sede->centro; ?></td>
          <td><?= $sede->municipio; ?></td>
          <td><a href="<?= base_url('Administrador/FrmEditarSede/' . $sede->codigo); ?>" class="btn bg-sena">Editar</a></td>
          <td>
            <button type="button" class="btn btn-danger eliminarSede" data-toggle="modal">
              Eliminar
            </button>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<!-- Modal -->
<div class="modal fade" id="eliminarSedeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Sede</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('Administrador/eliminarSede'); ?>" method="POST">
        <input type="hidden" id="codigo_sede" name="codigo">
        <div class="modal-body">
          Esta seguro de eliminar el Sede?
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