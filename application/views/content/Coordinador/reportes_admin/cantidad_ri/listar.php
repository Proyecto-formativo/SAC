<div class="container">
  <h2 class="text-center">Cantidad de citaciones por instructores en el año de <?= date('Y'); ?></h2>

  <table id="cant_instructor" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <th>Cantidad Citaciones</th>
        <th>Documento</th>
        <th>Instructor</th>
        <th>Año</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach($cant_ci_inst->result() as $cci) : ?>
        <tr>
          <td><?= $cci->cantidad_citaciones; ?></td>
          <td><?= $cci->documento; ?></td>
          <td><?= $cci->instructor; ?></td>
          <td><?= $cci->cur_year; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>