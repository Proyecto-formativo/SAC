<div class="container">
  <h1 class="text-center">Equipo Instructores</h1>
  <table class="table table-striped table-bordered mt-4" style="width: 100%;">
    <thead class="bg-sena">
      <tr>
        <th>Ficha</th>
        <th>Documento</th>
        <th>Instructor</th>
        <th>Estado</th>
        <th>Remover</th>
      </tr>  
    </thead>

    <tbody>
      <?php foreach($equipoinstructores->result() as $ei) : ?>
        <tr>
          <td><?= $ei->nroficha; ?></td>
          <td><?= $ei->documento; ?></td>
          <td><?= $ei->instructor; ?></td>
          <td><?= $ei->estado; ?></td>
          <td>
            <form action="<?= base_url('Administrador/eliminarInstructorFicha'); ?>" method="POST">
              <input type="hidden" name="documento" value="<?= $ei->documento; ?>">
              <input type="hidden" name="ficha" value="<?= $ei->nroficha; ?>">
              <input type="submit" name="remover" value="Remover" class="btn btn-danger">
            </form>
          </td>
        </tr>  
      <?php endforeach; ?>
    </tbody>
  </table>

  <a href="<?= base_url('Administrador/equipoinstructores'); ?>" class="btn bg-sena">Regresar al Modulo Equipo Instructores</a>

</div>