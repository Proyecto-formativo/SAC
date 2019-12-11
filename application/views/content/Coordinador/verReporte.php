<head>
	<!-- jQuery library -->
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

</button>

 <a id="ap"  href="<?=base_url('Coordinador/aprobarReporte/') . $reporte[0]->consecutivo;?>"><button type="button" class="btn btn-primary"  style="background: #fc7323; border: 1px solid #fc7323;" id="btnsave">Citar a comité</button></a>
	<?php if($reporte[0]->observaciones==""){ ?><button type="button"   data-toggle="modal" data-target="#Modal_obs"  class="btn btn-primary"  style="background: #fc7323; border: 1px solid #fc7323;" id="btnsave">Observaciones</button> <?php } ?>

	<button type="button" style="background: #249762" id="download" class="btn btn-primary" id="btnsave">Generar pdf</button>

	<a href="<?=base_url('Coordinador/reportes/');?>"><button type="button" class="btn btn-secondary" >Volver</button></a>
</p>
	<!-- MODAL OBSERVACIONES   -->
	<div class="modal fade" id="Modal_obs" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" >Indique Observaciones</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
                <input type="text" id="mailprofe" value="<?=$reporte[0]->mailpro;?>" style="display:none"	>
				<form action="">
					<textarea class="form-control" id="observacionesf" style="overflow: scroll; height: 350px"  rows="14" placeholder="Mensaje">
					</textarea>
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary" onclick="observaciones(<?=$reporte[0]->consecutivo;?>)" >Aceptar</button>
			</div>
			</div>

			</div>
		</div>
  <!--FIN MODAL OBSERVACIONES-->


<div id="pdf" style="background-color: white; width: 100%;">
	<h4 id="h4" align="center" >Reporte Generado N° <?=$reporte[0]->consecutivo;?></h4>


		<br>

	<?php if($reporte[0]->estado=="Aprobado"){echo " <script>document.getElementById('ap').style.display = 'none'</script>"; }?>

		<table class="table table-bordered table-dark" style="width: 100%; height: auto; word-wrap: break-word; overflow-wrap: break-word;">

			<tbody>
			<tr>
				<th class="bg-sena text-white text-center" scope="col">Área:</th>
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
				<th class="bg-sena text-white text-center" scope="row">Coordinador de área:</th>
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
				<td class="bg-light text-center" colspan="4"><?=$reporte[0]->tipoCalificacion;?></td>
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
					<td class="bg-sena text-white text-center" scope="col">Citar</td>
				</tr>


					<?php
					for ($i=0;$i<$filas;$i++){
						echo "<tr>";
						echo "<td class='bg-light text-center text-black' >". $ver[$i]->nombres."  ". $ver[$i]->apellidos."</td>";
						echo  "<td class='bg-light text-center text-black'>". $ver[$i]->docID."</td>";
						echo  "<td class='bg-light text-center text-black' colspan='3'>". $ver[$i]->correoPersonal." - ".$ver[$i]->correoCorporativo."</td>";
						if( $ver[$i]->telefonoFijo>0){echo $fijo=$ver[$i]->telefonoFijo;}else{$fijo="";}
						echo "<td class='bg-light text-center text-black'>".  $ver[$i]->telefonoMovil."  ".$fijo ."</td>";
						echo "<td class='bg-light text-center text-black'>";?>
						<?php if($ver[$i]->citacion==1){?>
					<button  onclick="citarAprendiz(<?=$ver[$i]->docID;?>,<?=$ver[$i]->consecutivoAprendizReporte;?>)" type="button" class="btn btn-warning"   id="citar">Citar A Comite</button>
						</td>
						<?php }else {echo "citado";};
					} echo '</tr>'; ?>


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



		<!--MODAL DE CITAR APRENDIZ-->
	<div class="modal" style="display:none" id="modal" role="document">
		<div class="modal-content" id="modalContent" style="width: 82.8%; margin-left: 16.5%;  height:89%; margin-top: 5.1%; overflow: scroll;">
			<div class="modal-header">
				<h5 class="modal-title"> </h5>
				<input  class="d-none"  id="snoc">
			</div>


			<div class="modal-body">

				<form style=" background:#249762 ; opacity: 0.8; text-align: center; width: 90%; margin: auto; color: #fff" action="<?=base_url('Coordinador/enviar_correo')?>" method="post">
					<div class="form-group" style="display: none">
						<label for="exampleFormControlInput1">Email address</label>
						<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect2">De:</label>
						<input type="email" class="form-control" value="<?=$cordi[0]->cordi; ?>" id="exampleFormControlInput1" placeholder="Destino">
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect2">Para: </label>
						<input type="text" class="form-control" name="para" id="para" placeholder="Destino">
					</div>
					<div class="form-group">
						<label for="exampleFormControlSelect2">Asunto:</label>
						<input type="text" class="form-control" value="<?=$asunto[0]; ?>" id="asuntof" placeholder="Asunto">
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Mensaje:</label>
						<textarea class="form-control" id="mensajef" rows="14" placeholder="Mensaje">
<?=$asunto[1],$reporte[0]->tipoFalta.' '.$asunto[2]."\n\n"; ?>
HECHOS:<?=$reporte[0]->justificacion."\n\n"; echo $reporte[0]->normasReglamento."\n\n";?>

<?=$asunto[3],$asunto[4],$reporte[0]->sede; ?>

						</textarea>
					</div>
					<div class="form-group">
						<input type="Submit" onclick="enviarCorreo(<?= $reporte[0]->consecutivo;?>)"  class="form-control btn-info bg-sena" id="exampleFormControlInput1" value="Enviar"    >
					</div>

				</form>

			<div class="modal-footer">
				<button onclick="ocultarModal()" type="button" class="btn btn-secondary">Cancelar</button>
				<!---<button onclick="enviarCorreo()" type="button" class="btn btn-primary">Enviar correo</button>-->

			</div>
		</div>
	</div><!--FIN MODAL-->
	


</body>

<script >
    var archivoInput = document.getElementById('evidentia');
    var archivo = archivoInput.value;
function ver()
{

    var extPermitidas = /(.pdf|.jpg)$/i;
   console.log(archivo);
	termino=["jpg",'png','txt','pdf'];
    valido=false;
	for(i=0;i<4;i++){
		pos=archivo.indexOf(termino[i]);
		
		if (pos!==-1){
			//alert("es archivo se puede visualizar");
			document.getElementById('visor').innerHTML =
				'<embed src="../../'+archivo+'" width="100%"  style=" min-height: 450px" />';

			document.getElementById('ver').style.display = 'none';
			document.getElementById('ocultar').style.display = 'inline';
			valido=true;
		}

	}	

	if (valido==false){
		//alert("el documento sera descargado, ya que no se puede visualizar");

		const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });

                    Toast.fire({
                        icon: 'info',
                        title: 'el documento sera descargado, ya que no se puede visualizar' 
                    });
				
			document.getElementById('visor').innerHTML =
			'<embed src="../../'+archivo+'" width="0px" height="0px"/>';

			//document.getElementById('ver').style.display = 'none';
		// abre otra pestaña 
		//var url = "../../"+archivo;  window.open(url);
    	
	}


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


	 //citarAprendiz() recoge como parametros documento de identidad y el consecutivo de aprendizreporte para generar una ventana de correo
	 function citarAprendiz(a,b) {
        document.getElementById('modal').style.display = 'block';
        var snoc=document.getElementById("snoc");
        snoc.value=b;

        $.ajax({
            type:'POST',
            data: 'id='+a,
            url:"../correo_aprendiz",
            success:function(r){
               correo=r;

                var s13=document.getElementById("para");
                s13.value=correo;
            }
        });//este ajax obtiene el correo del aprendiz  y lo asigna al elemento 'para' en el modal

        $.ajax({
            type:'POST',
            data: 'id='+a,
            url:"../nombre_aprendiz",
            success:function(r){
                var s13=document.getElementById("nombrecito");
                s13.value=r;
                alert(r);
            }
        });//ajax que obtiene el nombre del aprendiz y lo asigna al elemento con id 'nombrecito' dentro del modal

    }

    //oculta el modal de mensaje para correo
    function ocultarModal() {
        document.getElementById('modal').style.display = 'none';
    }


    function enviarCorreo(consecutivo) {
        var nombre=document.getElementsByName("para")[0].value;
        var snoc=document.getElementById("snoc").value;
        var asunto=document.getElementById("asuntof").value;
        var mensaje=document.getElementById("mensajef").value;
        $.ajax({
            type:'POST',
            data: {'mail': nombre, 'cons': snoc,'reporte':consecutivo,'asunto':asunto,'mensaje':mensaje },
            url:"../mail",
            success:function(r){
                if(r == true){

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });

                Toast.fire({
                    icon: 'success',
                    title:  "enviado correctamente"
                });
                }else{

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });

                    Toast.fire({
                        icon: 'info',
                        title: "no se pudo enviar el correo  por problemas de conexion"
                    });
				}

				setTimeout(() => {
					location.reload(false);
					
				}, 2000);

            }
        });



		ocultarModal();

    }

	function observaciones(repo){
        var obser=document.getElementById("observacionesf").value;
        var mail=document.getElementById("mailprofe").value;
        $.ajax({
            type:'POST',
            data: {obser:obser,reporte:repo,mail:mail},
            url:"../enviar_observaciones",
            success:function(r){
			   location.reload(false);
				alert(r);
            }
        });//este ajax envia las observaciones del reporte 

      
	}
</script>
