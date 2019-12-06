<div class="container">
<?php error_reporting(E_ALL ^ E_NOTICE);?>

<table id="example" class="table table-striped table-bordered" style="width:100%">
	
	<thead>
		<tr >
			<th> </th>
			<th> Ficha </th>
			<th>Programa de formacion </th>
			<th> FECHA </th>
			<?php if($caso=="todos"){
				echo '<th class="bg-sena"> Estado </th>';
			} ?>

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
				<?php if($caso=="todos"){
					echo '<td> '. $valor->estado.'</td>';
				} ?>
				<td style="background: #4F5155; padding:0px; ">
					<a href="<?=base_url('Coordinador/verReportes/') . $valor->consecutivo;?>" id="btn-4" class="btn botoncito btn4">
						<div class="style-botones boton">
							<button type="button" id="btn-3" class="btn botoncito  fa fa-search-plus" > </button>
						</div>
					</a>
				</td
			</tr>
		<?php endforeach?>
	</tbody>
</table>
</div>



