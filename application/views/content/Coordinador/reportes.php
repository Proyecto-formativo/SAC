
<?php error_reporting(E_ALL ^ E_NOTICE);?>


<table id="estadoinstructor" class="table table-striped table-bordered" style="width: 100%;">
    <thead>
      <tr>
       
        <th>FECHA </th>
		<th>FICHA</th>
        <th>PROGRAMA DE FORMACION </th>
		<?php if($caso=="todos"){
				echo '<th > ESTADO </th>';
			} ?>
        <th>VER</th>
      </tr>	


			<tbody >
		<?php foreach ($reporte->result() as $valor): ?>
			<tr>
				<td> <?= $valor->fecha?></td>
				<td> <?= $valor->numFicha?></td>
				<td> <?= $valor->nombre?></td>
				
				<?php if($caso=="todos"){
					echo '<td> '. $valor->estado.'</td>';
				} ?>
				<td style="background: #4F5155; padding:0px; ">
					<a href="<?=base_url('Coordinador/verReportes/') . $valor->consecutivo;?>" id="btn-4" class="btn botoncito btn4">
						<div class="style-botones boton">
							<img src="<?=base_url("assets/images_sac/lupa.png")?>" alt="" width="30" style="margin:auto">
						</div>
					</a>
				</td
			</tr>
		<?php endforeach?>
	</tbody>
		</table>


