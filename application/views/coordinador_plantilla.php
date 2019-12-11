
    <?=$header?>

<link rel="stylesheet" href="<?=base_url('assets/css/style_plantillas.css')?>">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://unpkg.com/tableexport@5.2.0/dist/css/tableexport.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
</head>
<body>

<header>
    <div class=" d-flex align-items-center text-white  style-flex">
        <img src="<?=base_url('assets/images_sac/logo_b_white.png')?>" class="style-img" alt="Logo SENA">
        <h3 class="st-text">SAC - Seguimientos Aprendices Citados </h3>
        <div>
            
            <h1 class="st-text d-inline"><img src="<?=base_url("assets/images_sac/icono_de_usuario.png")?>" width="50" alt="">   Coordinador:</h1>
            <p  class="d-inline"><?= $this->session->userdata('nombre')?></p>
        </div>
    </div>
</header>
<nav>
    <div class="style-contenido">
        <div class="style-navegacion">
            <a href="<?=base_url('Coordinador/reportes')?>" id="btn-4" class="btn botoncito btn4">
                <div class="style-botones ">
                    <button type="button" id="btn-1" class="btn botoncito">Citaciones a comité </button> <img src="<?=base_url("assets/images_sac/reportes.png")?>" width="30" alt="">
                </div>
            </a>

             <!-- Reportes -->
             <div class="dbtn-group dropright style-botones botoncito">
                <button class="btn botoncito dropdown-toggle " type="button" id="dropdownMenuUsuarios" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Reportes
                </button>

                <div class="dropdown-menu p-3" aria-labelledby="dropdownMenuUsuarios">
                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Coordinador/reporte_comite_evaluacion'); ?>" id="btn-2" class="dropdown-item">Aprendices citados a comité por fecha</a>
                    </div>

                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Coordinador/apr_c_area'); ?>" id="btn-2" class="dropdown-item">Aprendices citados a comité por área</a>
                    </div>

                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Coordinador/cant_ci_inst'); ?>" id="btn-2" class="dropdown-item">Cantidad de citaciones a comité realizadas por instructor</a>
                    </div>

                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Coordinador/cant_ci_centro'); ?>" id="btn-2" class="dropdown-item">Cantidad de aprendices citados por centro</a>
                    </div>

                    <div class="style-botones-dropdown">
                        <a href="<?= base_url('Coordinador/aprendices_citados'); ?>" id="btn-2" class="dropdown-item">Aprendices citados a comité</a>
                    </div>

                </div>
            </div>
            <!-- Fin Reportes -->




            <a href="<?=base_url('Coordinador/configuraciones')?>" id="btn-4" class="btn botoncito btn4">
                <div class="style-botones boton">
                    <button type="button" id="btn-3" class="btn botoncito">Configuración  </button><img src="<?=base_url("assets/images_sac/configuraciones.png")?>" width="25" alt="">
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
		<?php if (!empty($dinamica[1])){echo $dinamica[1];}?>
		<?=$dinamica[0];?>
    </div>
</section>

<?=$footer?>
