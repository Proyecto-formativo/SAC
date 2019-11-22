<h1 align="center">Reporte # <?=$reporte[0]->consecutivo;?></h1>
<?php


?>

<div class="reporter">
<div class="row">
	<div class="col-4" style="padding:0;">
		<input type="text" name="tarea" value="AREA"  class="bg-sena" style="  margin-left:10%; width:90%; text-align:center;"  readonly="readonly">
	</div>
	<div class="col-4"style="padding:0;" >
		<input type="text" name="area" value="<?=$reporte[0]->area;?>"  id="areados" style="width:100%;"  readonly="readonly">
	</div>
	<div class="col-2" style="padding:0;">
		<input type="text" name="consecut" value="FECHA"  class="bg-sena"  style="width:100%; text-align:center;" readonly="readonly" >
	</div>
	<div class="col-2" style="padding:0;">
		<input type="text" name="fecha" value="<?=$reporte[0]->fecha;?>"  id="fecha" style="width:90%;"  readonly="readonly">
	</div>
</div>
<div class="row">
	<div class="col-4" style="padding:0;">
		<input type="text" name="consecut" value="PROGRAMA"  class="bg-sena"  style="margin-left:10%; width:90%; text-align:center;"   readonly="readonly">
	</div>
	<div class="col-8"style="padding:0;" >
		<input type="text" name="programa" value=<?=$reporte[0]->programa;?>""  id="programa" style="width:97.5%;"  readonly="readonly">
	</div>
	<div class="col-2" style="padding:0;">
		<input type="text" name="consecut" value="NIVEL"  class="bg-sena"  style="margin-left:20%; width:80%;text-align:center;"   readonly="readonly">
	</div>
	<div class="col-2" style="padding:0;">
		<input type="text" name="nivel" value="<?=$reporte[0]->nivel;?>"  id="nivel" style="width:100%;"   readonly="readonly">
	</div>
	<div class="col-2" style="padding:0;">
		<input type="text" name="consecut" value="FICHA" class="bg-sena"  style="width:100%; text-align:center;"   readonly="readonly">
	</div>
	<div class="col-2"style="padding:0;" >
		<input type="text" name="ficha" value="<?=$reporte[0]->ficha;?>"  id="ficha" style="width:100%;"  readonly="readonly">
	</div>
	<div class="col-2" style="padding:0;">
		<input type="text" name="consecut" value="MUNICIPIO"  class="bg-sena"  style="width:100%; text-align:center;"   readonly="readonly">
	</div>
	<div class="col-2" style="padding:0;">
		<input type="text" name="municipio" value="<?=$reporte[0]->municipio;?>"  id="municipio" style="width:90%;"   readonly="readonly">
	</div>
	<div class="col-4" style="padding:0;">
		<input type="text" name="consecut" value="CENTRO"  class="bg-sena"  style="margin-left:10%; width:90%;text-align:center;" >
	</div>
	<div class="col-8"style="padding:0;" >
		<input type="text" name="centro" value="<?=$reporte[0]->centro;?>"  id="centro" style="width:97.5%;"  readonly="readonly">
	</div>
</div>
<div class="row">
	<div class="col-4" style="padding:0;">
		<input type="text" name="consecut" value="SEDE" class="bg-sena"  style="margin-left:10%; width:90%; text-align:center;"   readonly="readonly">
	</div>
	<div class="col-8"style="padding:0;" >
		<input type="text" name="sede" value="<?=$reporte[0]->sede;?>"  id="sede" style="width:97.5%;" >
	</div>
	<div class="col-4" style="padding:0;">
		<input type="text" name="consecut" value="ETAPA FORMACION" class="bg-sena"  style="margin-left:10%; width:90%; text-align:center;"   readonly="readonly">
	</div>
	<div class="col-8" style="padding:0;">
		<input type="text" name="etapa de formacion" value="<?=$reporte[0]->etapa_formacion;?>"  id="etapa de formacion" style=" width:97.5%;"  readonly="readonly">
	</div>
</div>
<div class="row">
	<div class="col-3" style="padding:0;">
		<input type="text" name="consecut" value="ETAPA PROYECTO"  class="bg-sena"  style="margin-left:13.5%; width:86.5%; text-align:center;"   readonly="readonly">
	</div>
	<div class="col-3"style="padding:0;" >
		<input type="text" name="etapa proyecto" value="<?=$reporte[0]->etapa_proyecto;?>"  id="etapa proyecto" style="width:100%;"   readonly="readonly">
	</div>
	<div class="col-3" style="padding:0;">
		<input type="text" name="consecut" value="INSTRUCTOR LIDER"  class="bg-sena" style="width:100%; text-align:center;"   readonly="readonly">
	</div>
	<div class="col-3" style="padding:0;">
		<input type="text" name="instructor lider" value="<?=$reporte[0]->Instructor_Lider?>"  id="instructor lider" style="width:92.5%;"  readonly="readonly">
	</div>
	<!----------instructor reporte-->
	<div class="col-4" style="padding:0;">
		<input type="text" name="consecut" value="INSTRUCTOR REPORTE "  class="bg-sena" style="margin-left:10%;   width:90%; text-align:center;"   readonly="readonly">
	</div>
	<div class="col-8" style="padding:0;">
		<input type="text" name="instructor reporte" value="<?=$reporte[0]->Instructor_Reporte;?>"  id="instructor reporte" style="width:97.5%;"  readonly="readonly">
	</div>
</div>
<br>
<div class="row">
	<div class="col-12" style="padding:0;">
		<input type="text" name="consecut" value="JUSTIFICACIÓN"  class="bg-sena" style="width:100%; text-align:center;"  readonly="readonly" >
	</div>
	<div class="col-12" style="padding:0;">
		<textarea class="form-control style-textareaficha"  name="justificacion" id="justificacion" rows="3"required readonly="readonly" ><?=$reporte[0]->justificacion;?></textarea>
	</div>

</div>
<div class="row">
	<div class="col-12" style="padding:0;">
		<input type="text" name="consecut" value="NORMAS REGLAMENTO"  class="bg-sena" style="width:100%; text-align:center;"  readonly="readonly" >
	</div>
	<div class="col-12" style="padding:0;">
		<textarea class="form-control style-textareaficha"  name="justificacion" id="justificacion" rows="3"required readonly="readonly" ><?=$reporte[0]->normasReglamento;?></textarea>

	</div>
</div>

	<div class="row">
		<div class="col-6" style="padding:0;">
			<input type="text" name="consecut" value="SUGERENCIA"  class="bg-sena" style="width:100%; text-align:center;"  readonly="readonly" >
		</div>
		<div class="col-6" style="padding:0;">
			<input type="text" name="sugerencia" value="<?=$reporte[0]->sugerencia;?>"  id="instructor reporte" style="width:97.5%;"  readonly="readonly">

		</div>
	</div>

<div class="row">
	<div class="col-3" style="padding:0;">
		<input type="text" name="consecut" value="TIPO FALTA" style="width:100%; text-align:center;"  class="bg-sena" readonly="readonly">
	</div>
	<div class="col-3" style="padding:0;">
		<input type="text" name="tipoFalta" value="<?=$reporte[0]->tipoFalta;?>" id="tipoFalta" style="width:100%; text-align:center;"   readonly="readonly">
	</div>
	<div class="col-3" style="padding:0;">
		<input type="text" name="consecut" value="CALIF. FALTA" style="width:100%; text-align:center;" class="bg-sena"  readonly="readonly">
	</div>
	<div class="col-3" style="padding:0;">
		<input type="text" name="calificacionFalta"  value="<?=$reporte[0]->tipoCalificacion;?>" id="calificacionFalta" style="width:100%; text-align:center;"   readonly="readonly">
	</div>
</div>

	<h2 class="verh2">Aprendices en el Reporte</h2>

	<?php error_reporting(E_ALL ^ E_NOTICE);?>

	<table border="2 black" style="text-align: center; margin: auto; padding: 1px">
		<thead  class="thead-dark bg-sena" >
		<th>Nombres</th>
		<th>Apellidos</th>
		<th>docID</th>
		<th>correo Personal</th>
		<th>Correo Institucional</th>
		<th>T. Movil</th>
		<th>T. Fijo</th>

		</thead>
		<tbody>

	<?php
	for ($i=0;$i<$filas;$i++){
		echo "<tr>";
		echo "<td>". $ver[$i]->nombres."</td>";
		echo  "<td>". $ver[$i]->apellidos."</td>";
		echo  "<td>". $ver[$i]->docID."</td>";
		echo  "<td>". $ver[$i]->correoPersonal."</td>";
		echo  "<td>". $ver[$i]->correoCorporativo."</td>";
		echo "<td>".  $ver[$i]->telefonoMovil."</td>";
	if( $ver[$i]->telefonoFijo>0){echo $fijo=$ver[$i]->telefonoFijo;}else{$fijo="null";}
		echo  "<td>".$fijo ."</td>";
		echo "	</tr>";
	}?>

		</tbody>
    </table>

	<h2 class="verh2" >Evidencias</h2>

<div class="evi" style="width: 95%; margin: auto; height: 130px;border: 2px solid #1f1d1d" >
	<div class="col-6">

				<?=$reporte[0]->evidencia;?>
	</div>
	<div class="col-6">


	</div>

</div>
<?php echo "<br>";



	?>

	<div class="modal-footer" style="margin-top:60px ">
		<button type="button" class="btn btn-primary" id="btnsave">Citar A Comite</button>
		<button type="button" class="btn btn-primary" id="btnsave">Generar Pdf</button>
		<br>
		<a href="<?=base_url('Coordinador/reportes/');?>"><button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button></a>

	</div>
</div>
</div>




