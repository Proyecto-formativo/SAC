
    <?=$header?>

<link rel="stylesheet" href="<?=base_url('assets/css/style_plantillas.css')?>">
</head>
<body>

<header>
    <div class=" d-flex align-items-center text-white  style-flex">
        <img src="<?=base_url('assets/images_sac/Logo-B-white.png')?>" class="style-img" alt="Logo SENA">
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
                    <button type="button" id="btn-1" class="btn botoncito">Reportes a Comite </button> <img src="<?=base_url("assets/images_sac/reportes.png")?>" width="30" alt="">
                </div>
            </a>

            <div class="dbtn-group dropright style-botones botoncito">
                <button class="btn botoncito dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Reportes Generales
                </button>

                <div class="dropdown-menu p-3" aria-labelledby="dropdownMenuButton">
                    <div class="style-botones-dropdown ">
                        <button type="button" id="btn-2" class="dropdown-item">Aprendices Citados Por Ficha Y Programa</button>
                    </div>
                    <div class="style-botones-dropdown ">
                        <button type="button" id="btn-2" class="dropdown-item">Areas Que Realizan Más Citaciones A Comité</button>
                    </div>
                    <div class="style-botones-dropdown ">
                        <button type="button" id="btn-2" class="dropdown-item">Total Aprendices Citados A Comité</button>
                    </div>
                    <div class="style-botones-dropdown ">
                        <button type="button" id="btn-2" class="dropdown-item">Total Aprendices Citados A Comité Por Materia</button>
                    </div>
                    <div class="style-botones-dropdown ">
                        <button type="button" id="btn-2" class="dropdown-item">Equipo Ejecutor Por Ficha</button>
                    </div>
                    <div class="style-botones-dropdown ">
                        <button type="button" id="btn-2" class="dropdown-item">Instructor Que Realiza Más Citaciones Por Programa De Foración</button>
                    </div>
                    <div class="style-botones-dropdown ">
                        <button type="button" id="btn-2" class="dropdown-item">Total Aprendices Citados A Comité</button>
                    </div>
                    <div class="style-botones-dropdown ">
                        <button type="button" id="btn-2" class="dropdown-item">Aprendices Citados Por Ficha Y Programa</button>
                    </div>
                    <div class="style-botones-dropdown ">
                        <button type="button" id="btn-2" class="dropdown-item">Total Aprendices Citados A Comité</button>
                    </div>
                    <div class="style-botones-dropdown ">
                        <button type="button" id="btn-2" class="dropdown-item">Total Aprendices Citados A Comité En El Año</button>
                    </div>
                </div>
            </div>




            <a href="<?=base_url('Coordinador/configuraciones')?>" id="btn-4" class="btn botoncito btn4">
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
		<?php if (!empty($dinamica[1])){echo $dinamica[1];}?>
		<?=$dinamica[0];?>
    </div>
</section>

<?=$footer?>
