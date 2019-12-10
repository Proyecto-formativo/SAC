<div class="container">
  <h2 class="text-center">Áreas por centro</h2>
  <a href="<?= base_url('Administrador/FrmAgregarAreasCentro'); ?>" class="btn bg-sena mb-3">Agregar</a>

  <table id="area" class="table table-striped table-bordered" style="width: 100%;">
    <thead>
      <tr>
        <th>Codigo</th>
        <th>Centro</th>
        <th>Áreas</th>
        <th>Editar</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($areas_centro->result() as $ac) : ?>
        <tr>
          <td><?= $ac->codigocentro; ?></td>
          <td><?= $ac->centro; ?></td>
          <td><?= $ac->areas; ?></td>
          <td><a href="<?= base_url('Administrador/FrmEditarAreasCentro/' . $ac->codigocentro); ?>" class="btn bg-sena">Editar</a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>

<script>
  <?= isset($mensaje) ? $mensaje : "" ;?>
</script>