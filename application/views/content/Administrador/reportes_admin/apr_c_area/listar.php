<div class="container">
  <h1 class="text-center">Reporte aprendices citados</h1>

  <?php if (!empty($aprendices_citados_area->result())) : ?>
    <div class="table-responsive mt-4">
      <table id="apr_area" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>Documento</th>
            <th>Aprendiz</th>
            <th>Fecha</th>
            <th>Programa</th>
            <th>Ficha</th>
            <th>Municipio</th>
            <th>Area</th>
            <th>Instructor</th>
            <th>Recomendación</th>
          </tr>
        </thead>

        <tbody>
          <?php foreach($aprendices_citados_area->result() as $rsa) : ?>
            <tr>
              <td><?= $rsa->documento; ?></td>
              <td><?= $rsa->aprendiz; ?></td>
              <td><?= $rsa->fecha; ?></td>
              <td><?= $rsa->programa; ?></td>
              <td><?= $rsa->ficha; ?></td>
              <td><?= $rsa->municipio; ?></td>
              <td><?= $rsa->area; ?></td>
              <td><?= $rsa->instructor; ?></td>
              <td><?= $rsa->recomendacion; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php else : ?>
    <p class="text-center">No hay reportes que coincidan con el área</p>  
  <?php endif; ?>  

  <a href="<?= base_url('Administrador/apr_c_area'); ?>" class="btn bg-sena mt-3">Regresar al Modulo Aprendices citados por área</a>
</div>