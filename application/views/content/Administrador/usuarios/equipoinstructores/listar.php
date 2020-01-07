<div class="container">
  <h2 class="text-center">Equipo instructores por fichas</h2>

  <a href="<?= base_url('Administrador/FrmAgregarEquipoInstructores'); ?>" class="btn bg-sena mb-3">Agregar</a>

  <div class="table-responsive mt-4">
    <table id="equipo_instructores" class="table table-striped table-bordered" style="width: 100%;">
      <thead>
        <tr>
          <th>Ficha</th>
          <th>Programa</th>
          <th>Equipo Instructores</th>
          <th>Editar</th>
        </tr>  
      </thead>

      <tbody>
        <?php foreach($equipoinstructores->result() as $ei) : ?>
          <tr>
            <td><?= $ei->ficha; ?></td>
            <td><?= $ei->programa; ?></td>
            <td><?= $ei->instructores; ?></td>
            <td><a href="<?= base_url('Administrador/FrmEditarEquipoInstructores/' . $ei->ficha); ?>" class="btn bg-sena">Editar</a></td>
          </tr>  
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</div>
<script>
  <?= isset($mensaje) ? $mensaje : "" ;?>
</script>