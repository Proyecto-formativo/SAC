<head>
	<style>
		a:hover{
			list-style: none;
		}
		h2{
			list-style: none;
			color:white;
		}row:hover{
			list-style: none;
				 }


	</style>
</head>
<body>
<div class="row"   style=" font-size: 1em;  font-family: Zurich B,Calibri,cursive; height: 50px; text-shadow: 2px 2px black; width: 100%; margin: auto;margin-bottom: 10px; text-transform:uppercase; text-align:center; uppercase; color: #fff";list-style="none">

		<div class="col-4" style=" border:2px solid #fff; background: #249784;"><a href="<?=base_url('Coordinador/reportes/') ;?>"><h2>Todos</h2></a> </div>
		<div class="col-4" style=" border:2px solid #fff; background: #249784;"><a href="<?=base_url('Coordinador/aprobados'); ?>">	<h2>Aprobados</h2></a></div>
	<div class="col-4" style=" border:2px solid #fff; background: #249784;"><a href="<?=base_url('Coordinador/cancelados'); ?>"><h2>No aprobados</h2></a></div>

</div>
</body>

