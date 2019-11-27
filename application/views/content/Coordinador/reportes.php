
<?php error_reporting(E_ALL ^ E_NOTICE);?>

<table id="vert" border="1" style="text-align: center; width: 99%; margin: auto; margin-top:30px">
	
	<thead class="thead-dark mb-5" style="width: 200%;">
		<tr >
			<th class="bg-sena"> </th>
			<th class="bg-sena"> FICHA </th>
			<th class="bg-sena">PROGRAMA DE FORMACION </th>
			<th class="bg-sena"> FECHA </th>
			<th class="bg-sena"> ESTADO </th>
			<th class="bg-sena"> VER</th>

		</tr>
	</thead>

	<tbody style="padding:0px" >
		<?php foreach ($reporte->result() as $valor): ?>
			<tr>
				<td> <?= $valor->consecutivo?></td>
				<td> <?= $valor->numFicha?></td>
				<td> <?= $valor->nombre?></td>
				<td> <?= $valor->fecha?></td>
				<td> <?= $valor->estado?></td>
				<td style="background: #4F5155; padding:0px; ">
					<a href="<?=base_url('Coordinador/verReportes/') . $valor->consecutivo;?>" id="btn-4" class="btn botoncito btn4">
						<div class="style-botones boton">
							<button type="button" id="btn-3" class="btn botoncito  fa fa-pencil-square-o" > </button>
						</div>
					</a>
				</td
			</tr>
		<?php endforeach?>
	</tbody>
</table>




