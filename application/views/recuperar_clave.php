<link rel="stylesheet" href="<?= base_url('assets/css/login.css')?>">
</head>
<body class="d-flex justify-content-center align-items-center">

<div class="border rounded contenido-login">
    <form method="post" action="<?=base_url('login_controller/recuperar_clave')?>">
        <h2 class="text-center">Recuperar contraseña</h2>

        <div class="form-group">
          <label for="exampleInputEmail1">Correo:</label>
          <input type="email" name="correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= isset($valor_correo) ? $valor_correo : "" ?>">
          <div class="text-danger">
          <?= isset($correovalidar) ? $correovalidar : "" ?>
          </div>
        </div>

        <button type="submit" class="btn btn-block btn-login">Restablecer contraseña</button>

    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
<?= isset($mensaje)?$mensaje:""?>
</script>