<h4 style="color: #4F5155" align="center" ><?php
	//$reporte;?></h4>

<?='<script>alert("Aprobación Exitosa!");</script>';?>
<?php
//header('location:/../../SAC/Coordinador/reportes');
//sleep(250);?>
<form  style=" background:#249762 ; opacity: 0.8; text-align: center; width: 90%; margin: auto; color: #fff" >
	<fieldset>
	<legend align="center">Informar por Email</legend>
	<div class="form-group" style="display: none">
		<label for="exampleFormControlInput1">Email address</label>
		<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
	</div>
	<div class="form-group">
		<label for="exampleFormControlSelect2"></label>
		<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Destino">
	</div>
	<div class="form-group">
		<label for="exampleFormControlSelect2"></label>
		<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Asunto">
	</div>
	<div class="form-group">
		<label for="exampleFormControlTextarea1"></label>
		<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Mensaje"></textarea>
	</div>
	<div class="form-group">
		<input type="Submit" class="form-control btn-info bg-sena" id="exampleFormControlInput1" value="Enviar"    >
	</div>
	</fieldset>
</form>


<br>
<p align="center"><a href="<?=base_url('Coordinador/verReportes/').$n;?>"><button type="button" class="btn bg-sena" data-dismiss="modal">Volver</button></a><?="  "; ?></p>
