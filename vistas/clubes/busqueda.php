<br/>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-6">
		
			
		<div class="table-responsive individual">
		<h3 class="menu text-center">Resultados de la busqueda: <?php echo ' '.$buscar; ?></h3>
  			<table class="table animated fadeIn">
  			<tr>
  				<th class="tabla">NOMBRE</th>
  				<th class="tabla"></th>
  			</tr>
			<!-- Muestra los post encontrados -->
			<?php foreach($posts as $post) { ?>
				<tr>
				  <td  class="tabla"> <?php echo ucwords($post->nombre); ?> </td>
				  <td  class="tabla"> <a class="btn btn-primary pull-right" href='?controlador=clubes&accion=individual&nombre=<?php echo $post->nombre; ?>'>Mostrar contenido</a></td>
				</tr>
			<?php } ?>
  			</table>
		</div>
		</div>
	</div><br/>
</div><br>
