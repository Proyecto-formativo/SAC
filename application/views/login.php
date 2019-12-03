<link rel="stylesheet" href="<?= base_url('assets/css/login.css')?>">
</head>
<body class="d-flex justify-content-center align-items-center">

<div class="  border  rounded contenido-login">
    <form method="post" action="<?=base_url('login_controller/validar')?>">
        <div class="logosena">
            <img src="<?= base_url('assets/images_sac/Logo.png')?>" alt="Logo SENA">
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
            <a href="<?= base_url('login_controller/recuperar_clave'); ?>" >¿Has olvidado tu contraseña?</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
<?= isset($mensaje)?$mensaje:""?>
</script>

