<br/>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-6">
		<div class="table-responsive individual">
		<div align="center">
			<img class="img-responsive text-center" src="./imgsubidas/<?php echo $post->imagen; ?>" width="100px"><br>
		</div>	
  			<table class="table ">
				<tr>
				  <td colspan="2" class="titulo"><h2 class="text-center"><?php echo strtoupper($post->nombre); ?></h2></td>
				</tr>
				<tr>
				  <td class="tabla">Año de Fundación</td>
				  <td class="tabla"><?php echo $post->fundado; ?></td>
				</tr>
				<tr>
					<td class="tabla">Nº de Socios</td>
					<td class="tabla"><?php echo $post->socios; ?></td>
				</tr>

				<tr>
					<td class="tabla">Nombre del Estadio</td>
					<td class="tabla"><?php echo $post->estadio; ?></td>
				</tr>

				<tr>
					<td class="tabla">Pais</td>
					<td class="tabla"><?php echo $post->pais; ?></td>
				</tr>

				<tr>
					<td class="tabla">Liga</td>
					<td class="tabla"><?php echo $post->liga; ?></td>
				</tr>

				<tr>
					<td class="tabla">Primera Equipación</td>
					<td class="tabla"><?php echo $post->priequipacion; ?></td>
				</tr>

				<tr>
					<td class="tabla">Segunda Equipación</td>
					<td class="tabla"><?php echo $post->segequipacion; ?></td>
				</tr>
  			</table>
		</div>
		
		<br>
			

			<a class="btn btn-primary pull-left" href='?controlador=clubes&accion=index'>Listado Clubs</a>

  			<a class="btn btn-danger pull-right" href='?controlador=clubes&accion=preborrar&nombre=<?php echo $post->nombre; ?>'>Eliminar</a>

  			<a class="btn btn-default pull-right" href='?controlador=clubes&accion=modificar&nombre=<?php echo $post->nombre;?>'>Modificar </a>
		</div>
		





		<div class="col-xs-12 col-md-3 individual" align="center">
			
		<h3 style="color:white">Galería de Imágenes</h3>

		<div class="row">
		<?php for ($i=0; $i < $total ; $i++): ?>
			
				<div class="col-xs-12">
					<img src="./imgsubidas/<?php echo $galeria[$i] ?>" class="img-responsive">
					<br>
				</div>

		<?php endfor; ?>
		</div>



		</div>



	</div>
</div>
<br><br>