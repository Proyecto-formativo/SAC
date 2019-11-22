
<?php error_reporting(E_ALL ^ E_NOTICE);?>

<table id="vert" border="1" style="text-align: center; width: 99%; margin: auto">
	<?php

	echo '<thead class="thead-dark" style="width: 200%;"> <tr >
                            <th>N. REPORTE </th>
                            <th> FICHA </th>
                            <th>PROGRAMA DE FORMACION </th>
                            <th> FECHA </th>
                            <th> VER REPORTE </th>
                        </tr>
                    </thead>';?>

	<tbody >


	<?php
	for ($i=0;$i<$cantidad;$i++) {
		//$arr[]=
		echo "<tr>";
		echo "<td>" . $reporte[$i]->consecutivo . "</td>";
		echo "<td>" . $reporte[$i]->numFicha . "</td>";
		echo "<td>" . $reporte[$i]->nombre . "</td>";
		echo "<td>" . $reporte[$i]->fecha . "</td>";
		?>
		<td style="background: #4F5155"><a href="<?=base_url('Coordinador/verReportes/');echo $reporte[$i]->consecutivo;?>" id="btn-4" class="btn botoncito btn4">
				<div class="style-botones boton">
					<button type="button" id="btn-3" class="btn botoncito">VerReporte  </button><i class="fa fa-pencil-square-o"></i>
				</div></td>
		</a><?php echo "</tr>";
	}


	?>



	</tbody>
</table>




