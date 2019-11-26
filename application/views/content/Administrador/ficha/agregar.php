<div class="container">
  <h1 class="text-center">Agregar Ficha</h1>

  <form action="<?= base_url('Administrador/agregarFicha'); ?>" method="POST">

    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Nro. Ficha:</label>
          <input type="text" name="nro_ficha" class="form-control" value="<?= set_value('nro_ficha'); ?>">
          <?= form_error('nro_ficha', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="">Fecha Inicio:</label>
          <input type="date" name="fecha_inicio" class="form-control" value="<?= set_value('fecha_inicio'); ?>">
          <?= form_error('fecha_inicio', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Fecha Final:</label>
          <input type="date" name="fecha_final" class="form-control" value="<?= set_value('fecha_final'); ?>">
          <?= form_error('fecha_final', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="">Programa:</label>
          <select name="programa" class="form-control">
            <?php foreach($programas->result() as $programa) : ?>
              <option value="<?= $programa->codigo; ?>" <?= set_select('programa', $programa->codigo); ?>><?= $programa->nombre; ?></option>
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
              <option value="<?= $municipio->codigo; ?>" <?= set_select('municipio', $municipio->codigo); ?>><?= $municipio->nombre; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="">Hora Inicio:</label>
          <input type="time" name="hora_inicio" class="form-control" value="<?= set_value('hora_inicio'); ?>">
          <?= form_error('hora_inicio', '<p class="text-danger">', '</p>'); ?>
        </div>      
      </div>
    </div>
    
    <div class="row">
      <div class="col-6">
        <div class="form-group">
          <label for="">Hora Fin:</label>
          <input type="time" name="hora_fin" class="form-control" value="<?= set_value('hora_fin'); ?>">
          <?= form_error('hora_fin', '<p class="text-danger">', '</p>'); ?>
        </div>
      </div>
      
      <div class="col-6">
        <div class="form-group">
          <label for="">Etapa Formación:</label>
          <select name="etapa_formacion" class="form-control">
            <?php foreach($etapasformacion->result() as $etapaformacion) : ?>
              <option value="<?= $etapaformacion->codigo; ?>" <?= set_select('etapa_formacion', $etapaformacion->codigo); ?>><?= $etapaformacion->nombre; ?></option>
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
              <option value="<?= $etapaproyecto->codigo; ?>" <?= set_select('etapa_proyecto', $etapaproyecto->codigo); ?>><?= $etapaproyecto->nombre; ?></option>
            <?php endforeach; ?>  
          </select>
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="">Instructor Lider:</label>
          <select name="instructor_lider" class="form-control">
            <?php foreach($instructores->result() as $instructor) : ?>
              <option value="<?= $instructor->documento; ?>" <?= set_select('instructor_lider', $instructor->documento); ?>><?= $instructor->instructor; ?></option>
            <?php endforeach; ?>  
          </select>
        </div>
      </div>
    </div>

    <input type="submit" name="submit" class="btn bg-sena" value="Agregar">
  </form>

  <a href="<?= base_url('Administrador/fichas'); ?>" class="btn bg-sena mt-3">Regresar al Modulo Ficha</a>
</div>