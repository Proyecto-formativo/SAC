<div class="container">
  <h1 class="text-center">Áreas por centro</h1>
  <table class="table table-striped table-bordered mt-4" style="width: 100%;">
    <thead class="bg-sena">
      <tr>
        <th>Codigo</th>
        <th>Centro</th>
        <th>Área</th>
        <th>Opción</th>
      </tr>  
    </thead>

    <tbody>
      <?php foreach($areascentro->result() as $ac) : ?>
        <tr>
          <td><?= $ac->codigocentro; ?></td>
          <td><?= $ac->centro; ?></td>
          <td><?= $ac->area; ?></td>
          <td>
            <form action="<?= base_url('Administrador/eliminarAreasCentro'); ?>" method="POST">
              <input type="hidden" name="centro" value="<?= $ac->codigocentro; ?>">
              <input type="hidden" name="area" value="<?= $ac->codigoarea; ?>">
              <input type="submit" name="remover" value="Remover" class="btn btn-danger">
            </form>
          </td>
        </tr>  
      <?php endforeach; ?>
    </tbody>
  </table>

  <a href="<?= base_url('Administrador/areas_centro'); ?>" class="btn bg-sena">Regresar al Modulo Áreas Centro</a>

</div>