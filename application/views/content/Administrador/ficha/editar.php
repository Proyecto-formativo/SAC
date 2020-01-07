<div class="container">
  <h1 class="text-center">Editar Ficha</h1>

  <form action="<?= base_url('Administrador/editarFicha'); ?>" method="POST">

    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Nro. Ficha:</label>
          <input type="text" name="nro_ficha" class="form-control" value="<?= $ficha->nroficha; ?>" readonly>
          <?= form_error('nro_ficha', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="">Fecha Inicio:</label>
          <input type="date" name="fecha_inicio" class="form-control" value="<?= $ficha->fechainicio; ?>">
          <?= form_error('fecha_inicio', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Fecha Final:</label>
          <input type="date" name="fecha_final" class="form-control" value="<?= $ficha->fechafinal; ?>">
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
          <input type="hidden" name="nroficha" id="nroficha" value="<?= $ficha->nroficha; ?>">
          <label for="">Municipio:</label>
          <select name="municipio" id="select_m" class="form-control">
            <?php foreach($municipios->result() as $municipio) : ?>
              <?php if ($municipio->codigo == $ficha->municipio) : ?>
                <option value="<?= $municipio->codigo; ?>" <?= set_select('municipio', $municipio->codigo); ?> selected><?= $municipio->nombre; ?></option>
              <?php else: ?>
                <option value="<?= $municipio->codigo; ?>" <?= set_select('municipio', $municipio->codigo); ?>><?= $municipio->nombre; ?></option>
              <?php endif; ?>  
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="infoSedeMunicipio col-6">
        <div class="form-group">
          <label for="">Sede:</label>
          <select name="sede" id="select_m" class="form-control">
            <?php foreach($sedes->result() as $sede) : ?>
              <?php if ($sede->codigo == $ficha->sede) : ?>
                <option value="<?= $sede->codigo; ?>" <?= set_select('sede', $sede->codigo); ?> selected><?= $sede->sede; ?></option>
              <?php else: ?>
                <option value="<?= $sede->codigo; ?>" <?= set_select('sede', $sede->codigo); ?>><?= $sede->sede; ?></option>
              <?php endif; ?>  
            <?php endforeach; ?>
          </select>
          <?= form_error('sede', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-4">
        <div class="form-group">
          <label for="">Hora Inicio:</label>
          <input type="time" name="hora_inicio" class="form-control" value="<?= $ficha->horainicio; ?>">
          <?= form_error('hora_inicio', '<p class="text-danger">', '</p>'); ?>
        </div>      
      </div>

      <div class="col-4">
        <div class="form-group">
          <label for="">Hora Fin:</label>
          <input type="time" name="hora_fin" class="form-control" value="<?= $ficha->horafin; ?>">
          <?= form_error('hora_fin', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>
      
      <div class="col-4">
        <div class="form-group">
          <label for="">Estado:</label>
          <select name="estado" class="form-control">
            <?php if ($ficha->estado == "En Ejecución") : ?>
              <option value="En Ejecución" <?= set_select('estado', "En Ejecución"); ?> selected>En Ejecución</option>
              <option value="Finalizada" <?= set_select('estado', "Finalizada"); ?>>Finalizada</option> 
            <?php endif; ?>  
            <?php if ($ficha->estado == "Finalizada") : ?>
              <option value="Finalizada" <?= set_select('estado', "Finalizada"); ?> selected>Finalizada</option> 
              <option value="En Ejecución" <?= set_select('estado', "En Ejecución"); ?>>En Ejecución</option>
            <?php endif; ?>  
          </select>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-4">
        <div class="form-group">
          <label for="">Etapa Proyecto:</label>
          <select name="etapa_proyecto" class="form-control">
            <?php foreach($etapasproyecto->result() as $etapaproyecto) : ?>
              <?php if ($etapaproyecto->codigo == $ficha->etapaproyecto) : ?>
                <option value="<?= $etapaproyecto->codigo; ?>" <?= set_select('etapa_proyecto', $etapaproyecto->codigo); ?> selected><?= $etapaproyecto->nombre; ?></option>
              <?php else : ?>
                <option value="<?= $etapaproyecto->codigo; ?>" <?= set_select('etapa_proyecto', $etapaproyecto->codigo); ?>><?= $etapaproyecto->nombre; ?></option>
              <?php endif; ?>  
            <?php endforeach; ?>  
          </select>
        </div>
      </div>

      <div class="col-4">
        <div class="form-group">
          <label for="">Etapa Formación:</label>
          <select name="etapa_formacion" class="form-control">
            <?php foreach($etapasformacion->result() as $etapaformacion) : ?>
              <?php if ($etapaformacion->codigo == $ficha->etapaformacion) : ?>
                <option value="<?= $etapaformacion->codigo; ?>" <?= set_select('etapa_formacion', $etapaformacion->codigo); ?> selected><?= $etapaformacion->nombre; ?></option>
              <?php else : ?>
                <option value="<?= $etapaformacion->codigo; ?>" <?= set_select('etapa_formacion', $etapaformacion->codigo); ?>><?= $etapaformacion->nombre; ?></option>
              <?php endif; ?>  
            <?php endforeach; ?>  
          </select>
        </div>
      </div>

      <div class="col-4">
        <div class="form-group">
          <label for="">Instructor Lider:</label>
          <select name="instructor_lider" class="form-control select2_instructor">
            <?php foreach($instructores->result() as $instructor) : ?>
              <?php if ($instructor->documento == $ficha->instructorlider) : ?>
                <option value="<?= $instructor->documento; ?>" <?= set_select('instructor_lider', $instructor->documento); ?> selected><?= $instructor->documento .' - '. $instructor->instructor; ?></option>
              <?php else : ?>
                <option value="<?= $instructor->documento; ?>" <?= set_select('instructor_lider', $instructor->documento); ?>><?= $instructor->documento .' - '. $instructor->instructor; ?></option>
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