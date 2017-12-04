<br/>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-6 animated fadeIn">
			<form role="form" class="form-horizontal" method="post" enctype="multipart/form-data" action="?controlador=clubes&accion=modificacion">
			<fieldset>
			<legend>Modificar el Club <?php echo $post->nombre; ?></legend>
  		        <div class="form-group">
                    <label for="nom" class="control-label col-xs-4">Nombre: </label>
                        <div class="col-xs-8">
                            <input type="text" name="nombre" class="form-control" value="<?php echo $post->nombre; ?>" readonly>
                        </div>
                </div>
     			<div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-4">Fundado el año :</label>
                        <div class="col-xs-8">
                            <input type="number" name="fundado" class="form-control" value="<?php echo $post->fundado; ?>">
                        </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-4">Nº de socios :</label>
                        <div class="col-xs-8">
                            <input type="number" name="socios" class="form-control" value="<?php echo $post->socios; ?>">
                        </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-4">Nombre Estadio :</label>
                        <div class="col-xs-8">
                            <input type="text" name="estadio" class="form-control" value="<?php echo $post->estadio; ?>">
                        </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-4">Pais :</label>
                        <div class="col-xs-8">
                            <input type="text" name="pais" class="form-control" value="<?php echo $post->pais; ?>">
                        </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-4">Liga :</label>
                        <div class="col-xs-8">
                            <input type="text" name="liga" class="form-control" value="<?php echo $post->liga; ?>">
                        </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-4">1ª Equipación :</label>
                        <div class="col-xs-8">
                            <input type="text" name="priequipacion" class="form-control" value="<?php echo $post->priequipacion; ?>">
                        </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail" class="control-label col-xs-4">2ª Equipación :</label>
                        <div class="col-xs-8">
                            <input type="text" name="segequipacion" class="form-control" value="<?php echo $post->segequipacion; ?>">
                        </div>
                </div>

                 <div class="form-group">
                    <label for="imagen" class="control-label col-xs-4">Escudo: </label>
                        <div class="col-xs-8">
                            <input type="file" name="imagen" class="form-control">
                            <p style="color:white"><b>*Tamaño Máximo : 1,5Mb</b></p>
                        </div>
                </div>

                <div class="form-group">
                    <label for="imagen" class="control-label col-xs-4">Cambiar Galeria: </label>
                        <div class="col-xs-8">
                            <input type="file" multiple="multiple" name="galeria[]" class="form-control">
                            <p style="color:white"><b>*Tamaño Máximo : 1,5Mb por foto  <br>*Máximo: 3 Fotos</b></p>
                        </div>
                </div>

			  	<div class="form-group">
        		 	<div class="col-xs-offset-4 col-xs-8">
            		 	<button type="submit" class="btn btn-success btn-block">Modificar</button>
         			</div>
     			</div>
     		</fieldset>
			</form>	
		</div>
	</div>
</div>