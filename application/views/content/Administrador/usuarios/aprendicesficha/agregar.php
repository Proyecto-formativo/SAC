<div class="container">
  <h1 class="text-center">Aprendices Ficha</h1>

  <form action="<?= base_url('Administrador/agregarAprendicesFicha'); ?>" method="POST">

    <div class="row">
      <div class="col-8">
        <div class="form-group">
          <label for="">Nro. Ficha</label>
          <select name="fichas" id="nroficha" class="form-control select_fichas">
            <?php foreach($fichas->result() as $ficha) : ?>
              <option value="<?= $ficha->nroficha; ?>"><?= $ficha->nroficha . ' - '. $ficha->programa; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
    </div>    

    <div class="row">
      <div class="col-8">
        <label for="">Aprendices:</label>
        <div class="form-group">
          <div class="d-flex">
            <input type="hidden" name="documento_aprendiz" id="docid_aprendiz">  
            <input type="text" name="aprendiz" class="form-control" disabled id="campo_aprendiz">
            <button type="button" class="btn bg-sena" data-toggle="modal" data-target="#aprendiz_detalle">Buscar</button>
            <button type="button" id="addAprendizDetalle" class="btn bg-sena ml-3">Agregar</button>
          </div>
        </div>
      </div>

      <div class="col-4">
        <div class="form-group">
          <label for="">Estado:</label>
          <select name="estado" id="estado_aprendiz" class="form-control">
            <?php foreach($estadoaprendices->result() as $estadoaprendiz) : ?>
              <option value="<?= $estadoaprendiz->codigo; ?>"><?= $estadoaprendiz->nombre; ?></option>

            <?php endforeach; ?>
          </select>
        </div>
      </div>
    </div>

    <!-- tabla maestro detalle -->          
    <table class="table table-bordered table-striped table-hover mt-4" id="aprendicesficha">
      <thead class="bg-sena">
        <tr>
          <th>Documento</th>
          <th>Nombre Completo</th>
          <th>Ficha</th>
          <th>Estado</th>
          <th>Opción</th>
        </tr>
      </thead>

      <tbody></tbody>
    </table>

    <div class="form-group">
      <input type="submit" class="btn bg-sena" id="agregarAF" value="Guardar" disabled>          
    </div>                                      
    <!-- fin tabla maestro detalle --> 
  </form>

  <a href="<?= base_url('Administrador/aprendicesficha')?>" class="btn bg-sena mt-3">Regresar al modulo Aprendices Ficha</a>
  
</div>


<div class="modal fade" id="aprendiz_detalle">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Aprendices</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          
          </div>
            <div class="modal-body">
              <table id="apr_detalle" class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th>Documento</th>
                    <th>Nombre Completo</th>
                    <th>Opcion</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach ($aprendices->result() as $aprendiz) : ?>
                      <tr>
                        <?php $datosaprendiz = $aprendiz->documento."*".$aprendiz->instructor;?>  
                        <td><?= $aprendiz->documento; ?></td>
                        <td><?= $aprendiz->instructor; ?></td>
                        <td><button class="btn bg-sena addAprendiz" value="<?= $datosaprendiz; ?>">+</button></td>
                      </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>
          </div>

          <div class="modal-footer">
              <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">Cerrar</button>
          </div>
      </div>
      <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
  <?= isset($mensaje) ? $mensaje : "" ;?>
</script>