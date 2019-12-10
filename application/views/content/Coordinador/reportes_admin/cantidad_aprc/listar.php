<div class="container">
  <h2 class="text-center">Cantidad de citaciones por centro en el año de <?= date('Y'); ?></h2>

  <table id="apr_centro" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>Cantidad Citaciones</th>
        <th>Centro</th>
        <th>Año</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach($cant_ci_centro->result() as $ccc) : ?>
        <tr>
          <td><?= $ccc->cantidad_citaciones; ?></td>
          <td><?= $ccc->centro; ?></td>
          <td><?= $ccc->cur_year; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>