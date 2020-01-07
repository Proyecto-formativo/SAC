<div class="container">
  <h2 class="text-center">Fichas</h2>
  <a href="<?= base_url('Administrador/FrmAgregarFicha'); ?>" class="btn bg-sena mb-3">Agregar</a>
  <div>
    <div class="table-responsive">
    <table id="ficha" class="table table-striped table-bordered" style="width: 100%; overflow-x: scroll;">
      <thead>
        <tr>
          <th>Nro. Ficha</th>
          <th>Programa</th>
          <th>Sede</th>
          <th>Municipio</th>
          <th>Etapa Formación</th>
          <th>Etapa Proyecto</th>
          <th>Estado</th>
          <th>Instructor Lider</th>
          <th>Horario</th>
          <th>Fecha Inicio</th>
          <th>Fecha Fin</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($fichas->result() as $ficha) : ?>
          <tr>
            <td><?= $ficha->nroficha; ?></td>
            <td><?= $ficha->programa; ?></td>
            <td><?= $ficha->sede; ?></td>
            <td><?= $ficha->municipio; ?></td>
            <td><?= $ficha->etapaformacion; ?></td>
            <td><?= $ficha->etapaproyecto; ?></td>
            <td><?= $ficha->estado; ?></td>
            <td><?= $ficha->instructorlider ?></td>
            <td><?= $ficha->horainicio; ?> a <?=$ficha->horafin; ?></td>
            <td><?= $ficha->fechainicio?></td>
            <td><?= $ficha->fechafinal?></td>
            <td><a href="<?= base_url('Administrador/FrmEditarFicha/' . $ficha->nroficha); ?>" class="btn bg-sena">Editar</a></td>
            <td>
              <button type="button" class="btn btn-danger eliminarFicha" data-toggle="modal">
                Eliminar
              </button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="eliminarFichaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Ficha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('Administrador/eliminarFicha'); ?>" method="POST">
        <input type="hidden" id="codigo_ficha" name="codigo">
        <div class="modal-body">
          Esta seguro de eliminar la Ficha?
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