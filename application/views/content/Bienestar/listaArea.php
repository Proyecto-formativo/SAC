

<div class="container">
    <h2>Acta comite</h2>
    <table id="example" class="table table-striped table-bordered" style="width:100%;">
        <thead  style=" font-size: 20px;">
            <tr class="bg-sena text-center">
                <th>Nombre Area</th>
                <th>Centro</th>
                <th>Coordinador</th>
                <th>Generar Acta</th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos->result() as $valores): ?>
                <tr>
                    <td><?=$valores->nombre?></td>
                    <td><?=$valores->centro?></td>
                    <td><?=$valores->coordinador?></td>
                    <td>
                        <form action="<?=base_url("Bienestar/crearActa")?>" method="post" class="text-center">
                            <input type="hidden" name="nombreArea" value="<?=$valores->nombre?>">
                            <input type="hidden" name="codigoArea" value="<?=$valores->codigo?>">
                            <input type="hidden" name="coordinador" value="<?=$valores->coordinador?>">
                            <button type="submit" style="background: none; border: none;">
                                <img src="<?=base_url("assets/images_sac/acta.png")?>" alt="generar acta" width="50">
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