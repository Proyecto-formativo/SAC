

<div class="container">
    <h2>Actas</h2>
    <table id="example" class="table table-striped table-bordered" style="width:100%;">
        <thead  style=" font-size: 20px;">
            <tr class="bg-sena text-center">
                <th>Nombre acta</th>
                <th>Fehca</th>
                <th>Hora inicio</th> 
                <th>Hora fin</th> 
                <th>ver Acta</th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos->result() as $valores): ?>
                <tr>
                    <td><?=$valores->consecutivo?></td>
                    <td><?=$valores->fecha?></td>
                    <td><?=$valores->horaInicio?></td>
                    <td><?=$valores->horaFin?></td>
                    <td>
                        <form action="<?=base_url("Bienestar/MostrarActa")?>" method="post" class="text-center">
                            <input type="hidden" name="consecutivoActa" value="<?=$valores->consecutivo?>">
                            <button type="submit" style="background: none; border: none;">
                                <img src="<?=base_url("assets/images_sac/ver.png")?>" alt="generar acta" width="50">
                            </button>  
                        </form>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>

<script>
<?= isset($mensaje)?$mensaje:""?>
</script>