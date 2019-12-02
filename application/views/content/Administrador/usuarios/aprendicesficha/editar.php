<div class="container">
  <h1 class="text-center">Aprendices Ficha</h1>
  <table class="table table-striped table-bordered mt-4" style="width: 100%;">
    <thead class="bg-sena">
      <tr>
        <th>Ficha</th>
        <th>Documento</th>
        <th>Aprendiz</th>
        <th>Estado</th>
        <th>Remover</th>
      </tr>  
    </thead>

    <tbody>
      <?php foreach($aprendicesficha->result() as $af) : ?>
        <tr>
          <td><?= $af->nroficha; ?></td>
          <td><?= $af->documento; ?></td>
          <td><?= $af->aprendiz; ?></td>
          <td><?= $af->estado; ?></td>
          <td>
            <form action="<?= base_url('Administrador/eliminarAprendicesFicha'); ?>" method="POST">
              <input type="hidden" name="documento" value="<?= $af->documento; ?>">
              <input type="hidden" name="ficha" value="<?= $af->nroficha; ?>">
              <input type="submit" name="remover" value="Remover" class="btn btn-danger">
            </form>
          </td>
        </tr>  
      <?php endforeach; ?>
    </tbody>
  </table>

  <a href="<?= base_url('Administrador/aprendicesficha'); ?>" class="btn bg-sena">Regresar al Modulo Aprendices Ficha</a>

</div>