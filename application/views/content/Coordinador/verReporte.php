<head>
	<!-- jQuery library -->
	<script src="<?=base_url('assets/jspdf/jquery-3.4.1.min.js');?>"></script>
	<script src="<?=base_url('assets/jspdf/jspdf.min.js');?>"></script>
	<script src="<?=base_url('assets/js/auth/coordinador.js');?>"></script>
	<style>
		.bg-sena,input{
			height:80%;

		}

	</style>
</head>
<body>
<p align="right" style="border-block-end-color:   #1f1d1d">

	<a id="ap"  href="<?=base_url('Coordinador/aprobarReporte/') . $reporte[0]->consecutivo;?>"><button type="button" class="btn btn-primary"  style="background: #fc7323; border: 1px solid #fc7323;" id="btnsave">Citar A Comite</button></a>
	<button type="button" style="background: #249762" id="download" class="btn btn-primary" id="btnsave">Generar Pdf</button>

	<a href="<?=base_url('Coordinador/reportes/');?>"><button type="button" class="btn btn-secondary" >Volver</button></a>
</p>

<div id="pdf" style="background-color: white; width: 100%;">
	<h4 id="h4" align="center" >Reporte Generado N° <?=$reporte[0]->consecutivo;?></h4>


		<br>

	<?php if($reporte[0]->estado=="Aprobado"){echo " <script>document.getElementById('ap').style.display = 'none'</script>"; }?>

		<table class="table table-bordered table-dark">

			<tbody>
			<tr>
				<th class="bg-sena text-white text-center" scope="col">Area:</th>
				<td class="bg-light text-center text-black" colspan="3"><?=$reporte[0]->area;?></td>
				<th class="bg-sena text-white text-center" scope="col">Fecha</th>
				<td class="bg-light text-center" colspan="2"><?=$reporte[0]->fecha;?></td>
			</tr>

			<tr>
				<th class="bg-sena text-white text-center" scope="row">Etapa formación:</th>
				<td class="bg-light text-black text-center" colspan="6"><?=$reporte[0]->etapa_formacion;?></td>
			</tr>

			<tr>
				<th class="bg-sena text-white text-center" scope="row">Programa:</th>
				<td class="bg-light text-black text-center" colspan="6"><?=$reporte[0]->programa;?></td>
			</tr>

			<tr>
				<th class="bg-sena text-white text-center" scope="col">No. Ficha:</th>
				<td class="bg-light text-center text-black" colspan=""><?=$reporte[0]->ficha;?></td>
				<th class="bg-sena text-white text-center" scope="col">Municipio:</th>
				<td class="bg-light text-center" colspan=""><?=$reporte[0]->municipio;?></td>
				<th class="bg-sena text-white text-center" scope="col">Horario:</th>
				<td class="bg-light text-center" colspan="2"><?=$reporte[0]->fecha;?></td>
			</tr>

			<tr>
				<th class="bg-sena text-white text-center" scope="row">Proyecto formativo:</th>
				<td class="bg-light text-black text-center" colspan="6"><?=$cordi[0]->pf;?></td>
			</tr>

			<tr>
				<th class="bg-sena text-white text-center" scope="row">Etapa Proyecto formativo:</th>
				<td class="bg-light text-black text-center" colspan="6"><?=$reporte[0]->etapa_proyecto;?></td>
			</tr>

			<tr>
				<th class="bg-sena text-white text-center" scope="row">Instructor lider:</th>
				<td class="bg-light text-black text-center" colspan="6"><?=$reporte[0]->Instructor_Lider;?></td>
			</tr>

			<tr>
				<th class="bg-sena text-white text-center" scope="row">Equipo ejecutor:</th>

				<td class="bg-light text-black text-center" colspan="6"><?php foreach ($equipo->result() as $valor){?><?=$valor->nombre.', '; } ?></td>

			</tr>

			<tr>
				<th class="bg-sena text-white text-center" scope="row">Coordinador de area:</th>
				<td class="bg-light text-black text-center" colspan="6"><?=$cordi[0]->cordi;?></td>
			</tr>

			<tr>
				<td class="bg-sena text-white text-center" colspan="7">Justificación motivo de citación a comité</td>
			</tr>

			<tr>
				<td class="bg-sena text-white text-center" rowspan="2">Hechos:</td>
				<td class="bg-light text-black text-center" colspan="6"><?=$reporte[0]->justificacion;?></td>
			</tr>

			<tr>
				<td class="bg-light text-black text-center" colspan="6">la evidencia se puede visualizar en la parte inferior</td>
			</tr>

			<tr>
				<th class="bg-sena text-white text-center" scope="col">Tipo de falta:</th>
				<td class="bg-light text-center text-black" colspan="2"><?=$reporte[0]->tipoFalta;?></td>
				<th class="bg-sena text-white text-center" scope="col">Calificación provisional de la falta</th>
				<td class="bg-light text-center" colspan="2"><?=$reporte[0]->tipoCalificacion;?></td>
			</tr>

			<tr>
				<th class="bg-sena text-white text-center" scope="row">Normas infringidas</th>
				<td class="bg-light text-black text-center" colspan="6"><?=$reporte[0]->normasReglamento;?>
				</td>
			</tr>
			<tr>
				<th class="bg-sena text-white text-center" scope="row">Sugerencia</th>
				<td class="bg-light text-black text-center" colspan="6"><?=$reporte[0]->sugerencia;?></td>
			</tr>

			<tr>
				<td class="bg-sena text-white text-center" colspan="7">Sugerencias al comité</td>
			</tr>

			<tr>
				<td class="bg-sena text-white text-center" colspan="">Nombre Aprendiz</td>
				<td class="bg-sena text-white text-center" scope="col">Documento</td>
				<td class="bg-sena text-white text-center" colspan="3">Correos Aprendiz</td>
				<td class="bg-sena text-white text-center" scope="col">Num. Contacto</td>
			</tr>

			<tr>
				<?php
				for ($i=0;$i<$filas;$i++){
					echo "<tr>";
					echo "<td class='bg-light text-center text-black' >". $ver[$i]->nombres."  ". $ver[$i]->apellidos."</td>";
					echo  "<td class='bg-light text-center text-black'>". $ver[$i]->docID."</td>";
					echo  "<td class='bg-light text-center text-black' colspan='3'>". $ver[$i]->correoPersonal." - ".$ver[$i]->correoCorporativo."</td>";
					if( $ver[$i]->telefonoFijo>0){echo $fijo=$ver[$i]->telefonoFijo;}else{$fijo="";}
					echo "<td class='bg-light text-center text-black'>".  $ver[$i]->telefonoMovil."  ".$fijo ."</td>";
					echo "	</tr>";

					echo "<tr>";
					// echo "<td>". $ver[$i]->nombres."</td>";
					// echo  "<td>". $ver[$i]->apellidos."</td>";
					// echo  "<td>". $ver[$i]->docID."</td>";
					// echo  "<td>". $ver[$i]->correoPersonal."</td>";
					// echo  "<td>". $ver[$i]->correoCorporativo."</td>";
					// echo "<td>".  $ver[$i]->telefonoMovil."</td>";
					// if( $ver[$i]->telefonoFijo>0){echo $fijo=$ver[$i]->telefonoFijo;}else{$fijo="";}
					// echo  "<td>".$fijo ."</td>";
					// echo "	</tr>";

				}?>

			</tr>



			</tbody>
		</table>



	</div>


	<div id="visor" class="evi" style="width: 95%; margin: auto; " >
		<div class="col-6">


		</div>

	</div>
	<input type="text" id="evidentia" value="<?=$reporte[0]->evidencia;?>" readonly="readonly" style="display:none " >
	<p align="center"><button id="ver" class="btn  btn-xs bg-sena" onclick="ver()">Ver Evidencias!</button>

	<a onclick="ocultar()" id="ocultar" style="display:none "><button  class="btn  btn-xs bg-sena">Ocultar Evidencias!</button  ></a></p>
</body>

<script >
    var archivoInput = document.getElementById('evidentia');
    var archivo = archivoInput.value;
function ver()
{

    var extPermitidas = /(.pdf|.jpg)$/i;
   console.log(archivo);
    document.getElementById('visor').innerHTML =
        '<embed src="../../'+archivo+'" width="100%"  style=" min-height: 450px" />';

    document.getElementById('ver').style.display = 'none';
    document.getElementById('ocultar').style.display = 'inline';


}

function ocultar() {
    document.getElementById('visor').style.display = 'none';
    document.getElementById('ocultar').style.display = 'none';
    document.getElementById('ver').style.display = 'block';
    document.getElementById('evidentia').value =archivo;
    location.reload(false);

    return true;
}

    function runMyFunction() {
        //code
		alert("se actualiza esta pagina");
        return true;
    }

</script>
