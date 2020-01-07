<div class="container">
  <h2 class="text-center">Aprendices ficha</h2>

  <a href="<?= base_url('Administrador/FrmAgregarAprendicesFicha'); ?>" class="btn bg-sena mb-3">Agregar</a>

  <div class="table-responsive mt-4">
    <table id="aprendices_ficha" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th>Ficha</th>
          <th>Programa</th>
          <th>Aprendices</th>
          <th>Editar</th>
        </tr>  
      </thead>

      <tbody>
        <?php foreach($aprendicesficha->result() as $af) : ?>
          <tr>
            <td><?= $af->nroficha; ?></td>
            <td><?= $af->programa; ?></td>
            <td><?= $af->aprendiz; ?></td>
            <td><a href="<?= base_url('Administrador/FrmEditarAprendicesFicha/' . $af->nroficha); ?>" class="btn bg-sena">Editar</a></td>
          </tr>  
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</div>

<script>
  <?= isset($mensaje) ? $mensaje : "" ;?>
</script>