<div class="container">
  <h1 class="text-center">Editar Ficha</h1>

  <form action="<?= base_url('Administrador/editarFicha'); ?>" method="POST">

    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Nro. Ficha:</label>
          <input type="text" name="nro_ficha" class="form-control" value="<?= $ficha->nroFicha; ?>" readonly>
          <?= form_error('nro_ficha', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="">Fecha Inicio:</label>
          <input type="date" name="fecha_inicio" class="form-control" value="<?= $ficha->fechaInicio; ?>">
          <?= form_error('fecha_inicio', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Fecha Final:</label>
          <input type="date" name="fecha_final" class="form-control" value="<?= $ficha->fechaFinal; ?>">
          <?= form_error('fecha_final', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="">Programa:</label>
          <select name="programa" class="form-control">
            <?php foreach($programas->result() as $programa) : ?>
              <?php if ($programa->codigo == $ficha->programa) :?>
                <option value="<?= $programa->codigo; ?>" <?= set_select('programa', $programa->codigo); ?> selected><?= $programa->nombre; ?></option>
              <?php else : ?>
                <option value="<?= $programa->codigo; ?>" <?= set_select('programa', $programa->codigo); ?>><?= $programa->nombre; ?></option>
              <?php endif; ?>  
            <?php endforeach; ?>
          </select>
        </div>      
      </div>
    </div>

    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Municipio:</label>
          <select name="municipio" class="form-control">
            <?php foreach($municipios->result() as $municipio) : ?>
              <?php if ($municipio->codigo == $ficha->municpio) : ?>
                <option value="<?= $municipio->codigo; ?>" <?= set_select('municipio', $municipio->codigo); ?> selected><?= $municipio->nombre; ?></option>
              <?php else: ?>
                <option value="<?= $municipio->codigo; ?>" <?= set_select('municipio', $municipio->codigo); ?>><?= $municipio->nombre; ?></option>
              <?php endif; ?>  
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="">Hora Inicio:</label>
          <input type="time" name="hora_inicio" class="form-control" value="<?= $ficha->horaInicio; ?>">
          <?= form_error('hora_inicio', '<p class="text-danger">', '</p>'); ?>
        </div>      
      </div>
    </div>
    
    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Hora Fin:</label>
          <input type="time" name="hora_fin" class="form-control" value="<?= $ficha->horaFin; ?>">
          <?= form_error('hora_fin', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>
      
      <div class="col-6">
        <div class="form-group">
          <label for="">Etapa Formación:</label>
          <select name="etapa_formacion" class="form-control">
            <?php foreach($etapasformacion->result() as $etapaformacion) : ?>
              <?php if ($etapaformacion->codigo == $ficha->etapaFormacion) : ?>
                <option value="<?= $etapaformacion->codigo; ?>" <?= set_select('etapa_formacion', $etapaformacion->codigo); ?> selected><?= $etapaformacion->nombre; ?></option>
              <?php else : ?>
                <option value="<?= $etapaformacion->codigo; ?>" <?= set_select('etapa_formacion', $etapaformacion->codigo); ?>><?= $etapaformacion->nombre; ?></option>
              <?php endif; ?>  
            <?php endforeach; ?>  
          </select>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Etapa Proyecto:</label>
          <select name="etapa_proyecto" class="form-control">
            <?php foreach($etapasproyecto->result() as $etapaproyecto) : ?>
              <?php if ($etapaproyecto->codigo == $ficha->etapaProyecto) : ?>
                <option value="<?= $etapaproyecto->codigo; ?>" <?= set_select('etapa_proyecto', $etapaproyecto->codigo); ?> selected><?= $etapaproyecto->nombre; ?></option>
              <?php else : ?>
                <option value="<?= $etapaproyecto->codigo; ?>" <?= set_select('etapa_proyecto', $etapaproyecto->codigo); ?>><?= $etapaproyecto->nombre; ?></option>
              <?php endif; ?>  
            <?php endforeach; ?>  
          </select>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="">Instructor Lider:</label>
          <select name="instructor_lider" class="form-control">
            <?php foreach($instructores->result() as $instructor) : ?>
              <?php if ($instructor->documento == $ficha->instructorLider) : ?>
                <option value="<?= $instructor->documento; ?>" <?= set_select('instructor_lider', $instructor->documento); ?> selected><?= $instructor->instructor; ?></option>
              <?php else : ?>
                <option value="<?= $instructor->documento; ?>" <?= set_select('instructor_lider', $instructor->documento); ?>><?= $instructor->instructor; ?></option>
              <?php endif; ?>  
            <?php endforeach; ?>  
          </select>
        </div>
      </div>
    </div>

    <input type="submit" name="submit" class="btn bg-sena" value="Guardar cambios">
  </form>

  <a href="<?= base_url('Administrador/fichas'); ?>" class="btn bg-sena mt-3">Regresar al Modulo Ficha</a>
</div>