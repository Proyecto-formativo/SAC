
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<?php
/**
 * este switch fue creado para controlar los archivos de los distintos perfiles ya que jquery causa errores
 */
switch ($this->session->userdata('perfil')) {
    case 1:
        ?>
        <script src="<?=base_url('assets/js/auth/instructor.js')?>"></script>
        <?php
        break;
    case 2:
        ?>
        <script src="<?=base_url('assets/js/auth/instructor.js')?>"></script>
        <?php
        break;
    case 3:
        ?>
        <script src="<?=base_url('assets/js/auth/instructor.js')?>"></script>
        <?php
        break;
    case 5:
        ?>
        <script src="<?=base_url('assets/js/auth/instructor.js')?>"></script>
        <?php
        break;
}
?>
</body>
</html>