
    <?=$header?>

    <link rel="stylesheet" href="<?=base_url('assets/css/style_plantillas.css')?>">
    <script src="https://kit.fontawesome.com/4de60b0d23.js" crossorigin="anonymous"></script>
</head>
<body>

    <header>
        <div class=" d-flex align-items-center text-white  style-flex">
            <img src="<?=base_url('assets/images_sac/Logo-B-white.png')?>" class="style-img" alt="Logo SENA">
            <h3 class="st-text">SAC - Seguimientos Aprendices Citados </h3>
            <div>
                
                <h1 class="st-text d-inline"><i class="fas fa-user"></i>  Instructor:</h1>
                <p  class="d-inline"><?= $this->session->userdata('nombre')?></p>
            </div>
        </div>
    </header>
    <nav>
        <div class="style-contenido">
            <div class="style-navegacion">
                <a href="<?=base_url('Instructor/reporte')?>" id="btn-4" class="btn botoncito btn4">
                    <div class="style-botones boton">
                        <button type="button" id="btn-3" class="btn botoncito">Realizar Reporte  </button><i class="far fa-bell"></i>
                    </div>
                </a>

                <a href="<?=base_url('Instructor/configuraciones')?>" id="btn-4" class="btn botoncito btn4">
                    <div class="style-botones boton">
                        <button type="button" id="btn-3" class="btn botoncito">Configuracion  </button><i class="fas fa-cog"></i>
                    </div>
                </a>
                

                <a href="<?=base_url('login_controller/logout')?>" id="btn-4" class="btn botoncito btn4">
                    <div class="style-botones ">
                        Salir <i class="fas fa-power-off"></i>
                    </div>
                </a>
                <hr>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!-- se usa el flashdata para darle la bienvenida al usuario en su entrada al sistema -->
    <script>
        <?php if ($data =$this->session->flashdata('msg')):?>
            <?=$data?>
        <?php endif;?>
    </script>

    <!-- el style-chage es el contenedor que tiene el laimagen conosida como fondo_index.png es un div sin contenido -->

    <section>
        <div class="style-change" id="change"></div>
        <div class="style-float">      
            <?=$dinamica?>
        </div>
    </section>
    
    <?=$footer?>
