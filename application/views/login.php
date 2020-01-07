<link rel="stylesheet" href="<?= base_url('assets/css/login.css')?>">
</head>
<body class="d-flex justify-content-center align-items-center">

<div class="  border  rounded contenido-login">
    <form method="post" action="<?=base_url('login_controller/validar')?>">
        <div class="logosena">
            <img src="<?= base_url('assets/images_sac/logosac.png')?>" alt="Logo SENA">
        </div>
        <div class="form-group   ">
            <label for="exampleInputEmail1 ">Número de documento:</label>
            <input type="text" name="documento" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= isset($valor_documento)? $valor_documento : ""?>">
            <div class="text-danger">
            <?= isset($documentovalidar) ? $documentovalidar  : "" ?>
            </div>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Contraseña:</label>
            <input type="password" name="contrasena" class="form-control" id="exampleInputPassword1" value="<?= isset($valor_contrasena)? $valor_contrasena : ""?>" >
            <div class="text-danger">
            <?= isset($contrasenavalidar) ? $contrasenavalidar  : "" ?>
            </div>
        </div>
        
        <button type="submit" class="btn btn-block btn-login">Ingresar</button>
        <div class="text-center mt-2">
            <a href="#" data-toggle="modal" data-target="#staticBackdrop">¿Has olvidado tu contraseña?</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
<?= isset($mensaje)?$mensaje:""?>
</script>







<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Recuperar contraseña:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="<?=base_url("login_controller/recuperar")?>" method="post">
                <div class="form-group">
                    <label for="docuemntoVerificacion">Documento:</label>
                    <input type="text" name="docuemntoVerificacion" class="form-control" id="docuemntoVerificacion" required>
                </div>
               <div class="form-group" style="display: none">
                    <label for="correo">Correo:</label>
                    <input type="email" name="correoverificacion" class="form-control" id="correo" aria-describedby="emailHelp" value="xx@hotmail.es" required>
                </div>
                <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
