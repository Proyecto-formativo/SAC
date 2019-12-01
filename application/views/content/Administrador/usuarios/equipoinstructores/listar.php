<div class="container">
  <h1 class="text-center">Equipo Instructores por Fichas</h1>

  <a href="<?= base_url('Administrador/FrmAgregarEquipoInstructores'); ?>" class="btn bg-sena">Agregar</a>

  <div class="table-responsive mt-4">
    <table id="equipo_instructores" class="table table-striped table-bordered mt-3" style="width: 100%;">
      <thead>
        <tr>
          <th>Ficha</th>
          <th>Equipo Instructores</th>
          <th>Editar</th>
        </tr>  
      </thead>

      <tbody>
        <?php foreach($equipoinstructores->result() as $ei) : ?>
          <tr>
            <td><?= $ei->ficha; ?></td>
            <td><?= $ei->instructores; ?></td>
            <td><a href="<?= base_url('Administrador/FrmEditarEquipoInstructores/' . $ei->ficha); ?>" class="btn bg-sena">Editar</a></td>
          </tr>  
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</div>