<br/>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-6 animated fadeIn">
			<form role="form" class="form-horizontal"  enctype="multipart/form-data" method="post" action="?controlador=clubes&accion=comprobacion">
			<fieldset>
			<legend>Introducir club</legend>
  				<div class="form-group">
         			<label for="nombre" class="control-label col-xs-4">Nombre:</label>
         				<div class="col-xs-8">
             				<input type="text" name="nombre" class="form-control" placeholder="Ej. FC Barcelona">
         				</div>
     			</div>
     			<div class="form-group">
         			<label for="fundado" class="control-label col-xs-4">Fundado el año :</label>
         				<div class="col-xs-8">
             				<input type="number" name="fundado" class="form-control" placeholder="Ej. 1898">
         				</div>
     			</div>

     			<div class="form-group">
         			<label for="socios" class="control-label col-xs-4">Nº de socios :</label>
         				<div class="col-xs-8">
             				<input type="number" name="socios" class="form-control" placeholder="Ej. 34565">
         				</div>
     			</div>

     			<div class="form-group">
         			<label for="estadio" class="control-label col-xs-4">Nombre Estadio :</label>
         				<div class="col-xs-8">
             				<input type="text" name="estadio" class="form-control" placeholder="Ej. Camp Nou ">
         				</div>
     			</div>

     			<div class="form-group">
         			<label for="pais" class="control-label col-xs-4">Pais :</label>
         				<div class="col-xs-8">
             				<input type="text" name="pais" class="form-control" placeholder="Ej. España">
         				</div>
     			</div>

     			<div class="form-group">
         			<label for="liga" class="control-label col-xs-4">Liga :</label>
         				<div class="col-xs-8">
             				<input type="text" name="liga" class="form-control" placeholder="Ej. Liga Santander">
         				</div>
     			</div>

                <div class="form-group">
                    <label for="priequipacion" class="control-label col-xs-4">1ª Equipación :</label>
                        <div class="col-xs-8">
                            <input type="text" name="priequipacion" class="form-control" placeholder="Ej. Blaugrana">
                        </div>
                </div>

                <div class="form-group">
                    <label for="segequipacion" class="control-label col-xs-4">2ª Equipación :</label>
                        <div class="col-xs-8">
                            <input type="text" name="segequipacion" class="form-control" placeholder="Ej. Azul cielo">
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
                    <label for="imagen" class="control-label col-xs-4">Galeria de Imagenes: </label>
                        <div class="col-xs-8">
                            <input type="file" multiple="multiple" name="galeria[]" class="form-control">
                            <p style="color:white"><b>*Tamaño Máximo : 1,5Mb por foto  <br>*Máximo: 3 Fotos</b></p>
                        </div>
                </div>
  

			  	<div class="form-group">
        		 	<div class="col-xs-offset-4 col-xs-8">
            		 	<button type="submit" class="btn btn-success btn-block">Enviar</button>
         			</div>
     			</div>
     		</fieldset>
			</form>	
		</div>
	</div>
</div>

