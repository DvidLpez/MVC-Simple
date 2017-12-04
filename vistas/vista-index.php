<DOCTYPE html>
<html>
  <head>
		  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		  <link rel="stylesheet" type="text/css" href="css/animate.css">
		  <link rel="stylesheet" type="text/css" href="css/awesome/css/font-awesome.min.css">
		  <link rel="stylesheet" type="text/css" href="css/equipos_futbol.css">
  </head>
 <body>
<header class="menu">

<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-3">
			<p><a class="menu" href='./'>INICIO</a></p>
		</div>
		<div class="col-xs-12 col-sm-6">
			
			<form class="navbar-form navbar-left" role="search" method="post" action="?controlador=clubes&accion=buscar">
      			<div class="form-group">
        			<input type="text" class="form-control"  name="busqueda" placeholder="Buscar club">
      			</div>
      			<button type="submit" class="btn btn-default fa fa-search"></button>
    		</form>

		</div>
		</div>
	</div>
</div>

</header>

<?php require_once('cerebro.php'); ?>

</body>
</html>
