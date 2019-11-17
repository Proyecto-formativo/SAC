

    <div class="text-center">
        <h2>Configuraciones de perfil</h2>
        <div class="container px-5">
            
            <?php
            /**
            * este switch fue creado para controlar los archivos de los distintos perfiles ya que jquery causa errores
            */
            switch ($this->session->userdata('perfil')) {
                case 1:
                    ?>
                    <form method="post" action="<?=base_url("Instructor/actualizarPerfil")?>">
                    <?php
                    break;
                case 2:
                    ?>
                    <form method="post" action="<?=base_url("Coordinador/actualizarPerfil")?>">
                    <?php
                    break;
                case 3:
                    ?>
                    <form method="post" action="<?=base_url("Bienestar/actualizarPerfil")?>">
                    <?php
                    break;
                case 5:
                    ?>
                    <form method="post" action="<?=base_url("Administrador/actualizarPerfil")?>">
                    <?php
                    break;
            }
            ?>
                <div class="px-5">
                    <label class="sr-only" for="nombre">Nombre:</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-clipboard-list"></i></div>
                        </div>
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre instructor" value="<?=isset($valor_nombre)?$valor_nombre:$datos->nombres?>">
                    </div>
                    <div class="text-danger">
                        <?= isset($nombre)?$nombre : ""?>
                    </div>
                </div>
                <!-- apellido del usuario -->
                <div class="px-5">
                    <label class="sr-only" for="apellido">Apellido:</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-clipboard-list"></i></div>
                        </div>
                        <input type="text" name="Apellido" class="form-control" id="apellido" placeholder="Apellidos" value="<?=isset($valor_apellido)?$valor_apellido:$datos->apellidos?>">
                    </div>
                    <div class="text-danger">
                        <?= isset($apellido)?$apellido : ""?>
                    </div>
                </div>
                <!-- correo del instructor -->
                <div class="px-5">
                    <label class="sr-only" for="correo">Correo:</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                        </div>
                        <input type="email" name="Correo" class="form-control" id="correo" placeholder="Correo" value="<?=isset($valor_Correo)?$valor_Correo:$datos->correoCorporativo?>">
                    </div>
                    <div class="text-danger">
                        <?= isset($Correo)?$Correo : ""?>
                    </div>
                </div>

                <div class="px-5">
                    <label class="sr-only" for="celular">Celular:</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-phone-alt"></i></div>
                        </div>
                        <input type="text"name="Celular" class="form-control" id="celular" placeholder="Celular"  value="<?=isset($valor_Celular)?$valor_Celular:$datos->telefonoMovil?>">
                    </div>
                    <div class="text-danger">
                        <?= isset($Celular)?$Celular : ""?>
                    </div>
                </div>

                <div class="px-5">
                    <label class="sr-only" for="password">Contraseña:</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
                        </div>
                        <input type="password"name="password" class="form-control" id="password" placeholder="Nueva Contraseña" size="10" maxlength="10" value="<?=isset($valor_password)?$valor_password:$datos->clave?>">
                    </div>
                    <div class="text-danger">
                        <?= isset($password)?$password : ""?>
                    </div>
                </div>

                

                <button type="submit" class="btn btn-success w-30 ">Guardar cambios</button>

            </form>
        </div>
    </div>
    <script>
        <?= isset($mensaje)?$mensaje:""?>
    </script>

        