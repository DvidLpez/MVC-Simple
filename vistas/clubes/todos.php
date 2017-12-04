<br/>

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-6">
		<a class="btn btn-primary btn-block" href='?controlador=clubes&accion=form'>+ ENTRAR NUEVO CLUB</a><br>
			
		<div class="table-responsive individual">
		<h3 class="menu text-center">Listado de Clubes, Cantidad: <?php echo $total; ?></h3>
  			<table class="table animated fadeIn">
  			<tr>
  				<th class="tabla">NOMBRE</th>
  				<th class="tabla"></th>
  			</tr>
			
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
	<!-- paginacion -->
	<div class="row">
		<div class="col-xs-12">
			<nav>
				<ul>
					<!-- boton de inicio en la paginacion -->
					<?php if ($pagina_actual===1): ?>
						<li class="btn btn-default disable"><i class="fa fa-angle-double-left" aria-hidden="false"></i></li>
					<?php else: ?>
						<li class="btn btn-default"><a href="?controlador=clubes&accion=index&p=<?php echo $pagina_actual - 1 ?>"><i class="fa fa-angle-double-left" aria-hidden="false"></i></a></li>
					<?php endif; ?>

					<!-- Nos dice el numero de paginas en la paginacion -->
					<?php for ($i = 1; $i <= $numero_paginas; $i++): ?>

						<?php if ($pagina_actual === $i): ?>
							<li class="btn btn-primary"><?php echo $i; ?></li>
						<?php else: ?>
							<li><a class="btn btn-default" href="?controlador=clubes&accion=index&p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
						<?php endif; ?>
					<?php endfor; ?>


					<!-- Boton para ir a la siguiente -->
					<?php if ($pagina_actual == $numero_paginas): ?>
						<li class="btn btn-default disable"><i class="fa fa-angle-double-right" aria-hidden="false"></i></li>
					<?php else: ?>
						<li><a class="btn btn-default" href="?controlador=clubes&accion=index&p=<?php echo $pagina_actual + 1 ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
					<?php endif; ?>	
				</ul>
			</nav>
		</div>
	</div>
</div><br>