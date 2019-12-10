<div class="container">
  <h2 class="text-center">Programas de formación</h2>
  <a href="<?= base_url('Administrador/FrmAgregarPrograma'); ?>" class="btn bg-sena mb-3">Agregar</a>

<div class="table-responsive">
  <table id="programa" class="table table-striped table-bordered" style="width: 100%;">
    <thead>
      <tr>
        <th>Codigo</th>
        <th>Programa</th>
        <th>Nivel</th>
        <th>Área</th>
        <th>Proyecto Formativo</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($programas->result() as $programa) : ?>
        <tr>
          <td><?= $programa->codigo; ?></td>
          <td><?= $programa->nombre; ?></td>
          <td><?= $programa->nivel; ?></td>
          <td><?= $programa->area; ?></td>
          <td><?= $programa->proyecto; ?></td>
          <td><a href="<?= base_url('Administrador/FrmEditarPrograma/' . $programa->codigo); ?>" class="btn bg-sena">Editar</a></td>
          <td>
            <button type="button" class="btn btn-danger eliminarPrograma" data-toggle="modal">
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
<div class="modal fade" id="eliminarProgramaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Programa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('Administrador/eliminarPrograma'); ?>" method="POST">
        <input type="hidden" id="codigo_programa" name="codigo">
        <div class="modal-body">
          Esta seguro de eliminar el Programa?
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