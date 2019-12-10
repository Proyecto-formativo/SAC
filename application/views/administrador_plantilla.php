
    <?=$header?>

<link rel="stylesheet" href="<?=base_url('assets/css/style_plantillas.css')?>">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://unpkg.com/tableexport@5.2.0/dist/css/tableexport.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
<!--<script src="https://kit.fontawesome.com/4de60b0d23.js" crossorigin="anonymous"></script> -->
</head>
<body>

<header>
    <div class=" d-flex align-items-center text-white  style-flex">
        <img src="<?=base_url('assets/images_sac/logo-b-white.png')?>" class="style-img" alt="Logo SENA">
        <h3 class="st-text">SAC - Seguimientos Aprendices Citados </h3>
        <div>
            
            <h1 class="st-text d-inline"><img src="<?=base_url("assets/images_sac/icono_de_usuario.png")?>" width="50" alt="">   Administrador:</h1>
            <p  class="d-inline"><?= $this->session->userdata('nombre')?></p>
        </div>
    </div>
</header>
<nav>
    <div class="style-contenido">
        <div class="style-navegacion">


        <!-- Boton Administrar -->
        <div class="dbtn-group dropright style-botones botoncito">
                <button class="btn botoncito dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Administrar
                </button>

                <div class="dropdown-menu p-3" aria-labelledby="dropdownMenuButton">
                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Administrador/sugerencia'); ?>" id="btn-2" class="dropdown-item">Sugerencias</a>
                    </div>

                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Administrador/recomendacion'); ?>" id="btn-2" class="dropdown-item">Recomendaciones</a>
                    </div>

                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Administrador/municipio'); ?>" id="btn-2" class="dropdown-item">Municipios</a>
                    </div>

                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Administrador/etapaformacion'); ?>" id="btn-2" class="dropdown-item">Etapa formación</a>
                    </div>

                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Administrador/etapaproyecto'); ?>" id="btn-2" class="dropdown-item">Etapa proyecto</a>
                    </div>

                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Administrador/estadoinstructor'); ?>" id="btn-2" class="dropdown-item">Estado instructor</a>
                    </div>

                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Administrador/estadoaprendiz'); ?>" id="btn-2" class="dropdown-item">Estado aprendiz</a>
                    </div>

                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Administrador/centros'); ?>" id="btn-2" class="dropdown-item">Centros</a>
                    </div>

                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Administrador/sedes'); ?>" id="btn-2" class="dropdown-item">Sedes</a>
                    </div>

                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Administrador/niveles'); ?>" id="btn-2" class="dropdown-item">Niveles</a>
                    </div>

                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Administrador/areas'); ?>" id="btn-2" class="dropdown-item">Áreas</a>
                    </div>

                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Administrador/programas'); ?>" id="btn-2" class="dropdown-item">Programas</a>
                    </div>

                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Administrador/fichas'); ?>" id="btn-2" class="dropdown-item">Fichas</a>
                    </div>

                </div>
            </div>

            <!-- Fin Boton Administrar -->

            <!-- Administración de Usuarios -->
            <div class="dbtn-group dropright style-botones botoncito">
                <button class="btn botoncito dropdown-toggle " type="button" id="dropdownMenuUsuarios" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Usuarios
                </button>

                <div class="dropdown-menu p-3" aria-labelledby="dropdownMenuUsuarios">
                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Administrador/administradores'); ?>" id="btn-2" class="dropdown-item">Administradores</a>
                    </div>

                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Administrador/coordinadores'); ?>" id="btn-2" class="dropdown-item">Coordinadores</a>
                    </div>

                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Administrador/instructores'); ?>" id="btn-2" class="dropdown-item">Instructores</a>
                    </div>

                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Administrador/bienestar'); ?>" id="btn-2" class="dropdown-item">Bienestar</a>
                    </div>

                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Administrador/aprendices'); ?>" id="btn-2" class="dropdown-item">Aprendices</a>
                    </div>

                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Administrador/equipoinstructores'); ?>" id="btn-2" class="dropdown-item">Equipo Instructores Ficha</a>
                    </div>

                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Administrador/aprendicesficha'); ?>" id="btn-2" class="dropdown-item">Aprendices Ficha</a>
                    </div>
                </div>
            </div>
            <!-- Fin Administración de Usuarios -->

            <!-- Reportes -->
            <div class="dbtn-group dropright style-botones botoncito">
                <button class="btn botoncito dropdown-toggle " type="button" id="dropdownMenuUsuarios" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Reportes
                </button>

                <div class="dropdown-menu p-3" aria-labelledby="dropdownMenuUsuarios">
                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Administrador/reporte_comite_evaluacion'); ?>" id="btn-2" class="dropdown-item">Aprendices citados a comité por fecha</a>
                    </div>

                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Administrador/apr_c_area'); ?>" id="btn-2" class="dropdown-item">Aprendices citados a comité por área</a>
                    </div>

                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Administrador/cant_ci_inst'); ?>" id="btn-2" class="dropdown-item">Cantidad de citaciones a comité realizadas por instructor</a>
                    </div>

                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Administrador/cant_ci_centro'); ?>" id="btn-2" class="dropdown-item">Cantidad de aprendices citados por centro</a>
                    </div>

                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Administrador/aprendices_citados'); ?>" id="btn-2" class="dropdown-item">Aprendices citados a comité</a>
                    </div>

                </div>
            </div>
            <!-- Fin Reportes -->

            <!-- Backup Base de datos -->

            <a href="<?=base_url('Administrador/backup_database')?>" id="btn-4" class="btn botoncito btn4">
                <div class="style-botones boton">
                    <button type="button" id="btn-3" class="btn botoncito">Backup</button>
                </div>
            </a>

            <a href="<?=base_url('Administrador/configuraciones')?>" id="btn-4" class="btn botoncito btn4">
                <div class="style-botones boton">
                    <button type="button" id="btn-3" class="btn botoncito">Configuracion  </button><img src="<?=base_url("assets/images_sac/configuraciones.png")?>" width="25" alt="">
                </div>
            </a>
            

            <a href="<?=base_url('login_controller/logout')?>" id="btn-4" class="btn botoncito btn4">
                <div class="style-botones ">
                    Salir <img src="<?=base_url("assets/images_sac/salir.png")?>" width="25" alt="">
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
