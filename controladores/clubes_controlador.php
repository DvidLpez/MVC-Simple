<?php 
class ClubesControlador{

    //         ASOCIADO A INICIO
    ///////////////////////////////////
    //////////////////////////////////////
public function inicio(){
    require_once('vistas/clubes/inicio.php');
    }

    //         ASOCIADO A ERROR
    ///////////////////////////////////
    //////////////////////////////////////

public function error() {
      require_once('vistas/clubes/error.php');
    }

    //         ASOCIADO A FORMULARIO NUEVO
    //////////////////////////////////////
    //////////////////////////////////////


public function form(){
      require_once('vistas/clubes/form.php');
    }

    //         ASOCIADO A COMPROBAR FORMULARIO
    ///////////////////////////////////////////////
    ///////////////////////////////////////////////

public function comprobacion(){
    $error = "";
    $error1 = "";
    $error2 = "";
    $error3="";
	$post = Post::find($_POST['nombre']);
    // comprobamos que el nombre del club no sea repetido o en blanco
    if($post==0 && $_POST['nombre'] != ""){
            
        // comprobamos el tamaño de la imagen del escudo
        $tamano = $_FILES['imagen']['size'];
        if($tamano >0 && $tamano < 1500000){

            //Comprobamos el tipo de fichero 
                $tipo = $_FILES['imagen']['type'];
                
                if($tipo == 'image/jpeg' || $tipo =='image/png'){ 
                    // como el tamaño es correcto cargamos la foto a la carpeta
                    $imagen = $_FILES['imagen']['tmp_name'];
                    $archivo_subido = './imgsubidas/'.$_FILES['imagen']['name'];
                    move_uploaded_file($imagen, $archivo_subido);
                    // Damos valor a la variable escudo para poner el nombre el la bbdd 
                    $escudo = $_FILES['imagen']['name'];
                // Else del escudo con tipo de archivo no valido.
                }else{

                    $escudo = 'plantilla.jpg';
                    $error = 'El archivo del escudo no es una imagen válida, se ha insertado una plantilla';
                    
                }
            // Else de si el escudo no se ha insertado o es muy pesado
        }else{              
                if ($tamano == 0 ) {
                   $escudo = 'plantilla.jpg';
                   $error = 'Se ha insertado una plantilla por defecto como escudo';
                }

                if ($tamano > 1500000) {
                    $escudo = 'plantilla.jpg';
                    $error = 'Imagen del escudo demasido pesada,se ha insertado una por defecto';
                }
        }


            // miramos la galeria de fotos
            // comprobamos que haya fotos en el array
            $fotos = $_FILES['galeria']['name'][0];
            $extension = $_FILES['galeria']['type'][0];
            
            if ($fotos == "") {
            $galeria = 'NULL';
            }else{

                // si hay fotos comprobamos que sus formatos sean correctos
            $recorrido = count($_FILES['galeria']['name']);      
            

            if ($recorrido <4){

                $bandera1 = true;
                for ($i=0; $i < $recorrido; $i++) { 
                    if (($_FILES['galeria']['type'][$i] != 'image/jpeg') && ($_FILES['galeria']['type'][$i] != 'image/png'))  {
                    $bandera1 = false;
                    $error1 = 'Los archivos de la galería no son válidos';
                    $i = $recorrido;
                    }
                }

                // si los formatos son correctos miramos sus tamaños
                if ($bandera1) {
                    $bandera2 = true;
                    for ($i=0; $i < $recorrido; $i++) {  
                        if($_FILES['galeria']['size'][$i] > 1500000){
                        $bandera2 = false;
                        $error2 = 'Los archivos de la galería muy pesados, no se insertarán';
                        $i = $recorrido;  
                        }
                    }
                }
                // si los formatos y tamaños son correctos
                if ($bandera1 && $bandera2){
                    // cargamos las fotos en la carpeta
                    for ($j=0; $j < $recorrido ; $j++) { 
                        $imagen = $_FILES['galeria']['tmp_name'][$j];
                        $archivo_subido = './imgsubidas/'.$_FILES['galeria']['name'][$j];
                        move_uploaded_file($imagen, $archivo_subido);
                    }
                    // damos valor a la variable codificando en json
                    $galeria = json_encode($_FILES['galeria']['name']);   
                }else{
                    $galeria = 'NULL';
                }
            }else{
                $galeria = 'NULL';
                $error3 = 'Hay demasiadas fotos en la galeria. Máximo 3.';
            }
            }

    

    //         ASOCIADO A AÑADIDR DATOS A LA BBDD
    ///////////////////////////////////////////////
    ///////////////////////////////////////////////

    Post::addbd( 
    $_POST['nombre'],
    $_POST['fundado'],
    $_POST['socios'],
    $_POST['estadio'],
    $_POST['pais'],
    $_POST['liga'],
    $_POST['priequipacion'],
    $_POST['segequipacion'],
    $escudo,
    $galeria
    );
                                
    require_once('vistas/clubes/insertado.php');
    }else{

    require_once('vistas/clubes/clubdoble.php');
    }
}



    //         ASOCIADO A LA VISTA INDIVIDUAL
    ///////////////////////////////////////////////
    ///////////////////////////////////////////////


public function individual(){
        if (!isset($_GET['nombre']))
        return call('clubes', 'error');
        

      $post = Post::individual($_GET['nombre']);
      $galeria = Post::galeria($_GET['nombre']);
      $galeria = json_decode($galeria[0]);
      $total = count($galeria);
     
      require_once('vistas/clubes/individual.php');
}


    //         ASOCIADO A LA LISTA DE CLUBS
    ///////////////////////////////////////////////
    ///////////////////////////////////////////////


public function index(){
    
    $total = Post::contar();
    // $posts = Post::all();
    
    $post_por_pagina = 6;
    $pagina_actual = Post::pagina_actual();
    $numero_paginas = ceil($total / $post_por_pagina);

    $inicio = ($pagina_actual > 1) ? ($pagina_actual * $post_por_pagina) - $post_por_pagina : 0;

    $posts = Post::obtener_post($inicio, $post_por_pagina);



    require_once('vistas/clubes/todos.php');
}

    //         ASOCIADO A LA LISTA ANTES DE BORRAR
    ///////////////////////////////////////////////
    ///////////////////////////////////////////////

public function preborrar(){
    $post = Post::individual($_GET['nombre']);
    require_once('vistas/clubes/preborrar.php');
}

    //         ASOCIADO A LA BORRAR UN ELEMENTO
    ///////////////////////////////////////////////
    ///////////////////////////////////////////////

public function eliminar(){
    Post::eliminar($_GET['nombre']);
    $total = Post::contar();
    // paginacion
    $post_por_pagina = 6;
    $pagina_actual = Post::pagina_actual();
    $numero_paginas = ceil($total / $post_por_pagina);

    $inicio = ($pagina_actual > 1) ? ($pagina_actual * $post_por_pagina) - $post_por_pagina : 0;

    $posts = Post::obtener_post($inicio, $post_por_pagina);
    require_once('vistas/clubes/todos.php');
}


    //         ASOCIADO A EL FORMULARIO MODIFICAR
    ///////////////////////////////////////////////
    ///////////////////////////////////////////////

public function modificar(){
    $post = Post::individual($_GET['nombre']);

    // $posts = Post::all();
    require_once('vistas/clubes/modificar.php');
}


    //         ASOCIADO A MODIFICAR EN BBDD
    ///////////////////////////////////////////////
    ///////////////////////////////////////////////

public function modificacion(){

    Post::modificacion(
                $_POST['nombre'],
                $_POST['fundado'],
                $_POST['socios'],
                $_POST['estadio'],
                $_POST['pais'],
                $_POST['liga'],
                $_POST['priequipacion'],
                $_POST['segequipacion']
                );

    // comprobamos la foto del escudo
    $error = "";
    $tamano = $_FILES['imagen']['size'];
    
    if ($tamano != 0 ) {
        // comprobamos que el tipo sea correco
        if(($_FILES['imagen']['type'] == 'image/jpeg')||($_FILES['imagen']['type'] == 'image/png') ){
            

            if($_FILES['imagen']['size'] < 1500000){
                $imagen = $_FILES['imagen']['tmp_name'];
                $archivo_subido = $_FILES['imagen']['name'];
                move_uploaded_file($imagen, $archivo_subido);
                Post::subirImagen($_POST['nombre'],$archivo_subido);

            }else{
                $error = 'El archivo del escudo es muy pesado, no se modificará.';
            }
        }else{
            $error = 'El formato del escudo no es el correcto, no se modificará.';
        }

    }

            //COMPROBAMOS LA GALERIA DE FOTOS

            $error1 = "";
            $error2 = "";
            $error3 = "";
            $fotos = $_FILES['galeria']['name'][0];
            $extension = $_FILES['galeria']['type'][0];
            
            if ($fotos != ""){

                // si hay fotos comprobamos que sus formatos sean correctos
                $recorrido = count($_FILES['galeria']['name']);

                if ($recorrido < 4) {
                    
                
                    $bandera1 = true;
                    for ($i=0; $i < $recorrido; $i++) { 
                        if (($_FILES['galeria']['type'][$i] != 'image/jpeg') && ($_FILES['galeria']['type'][$i] != 'image/png'))  {
                        $bandera1 = false;
                        $error1 = 'Algún archivo de la galeria no es válido, no se modificará.';
                        $i = $recorrido;
                        }
                    }

                    // si los formatos son correctos miramos sus tamaños
                    if ($bandera1) {
                        $bandera2 = true;
                        for ($i=0; $i < $recorrido; $i++) {  
                            if($_FILES['galeria']['size'][$i] > 1500000){
                            $bandera2 = false;
                            $error2 = 'Algún archivo de la galeria pesa demasiado, no se modificará.';
                            $i = $recorrido;  
                            }
                        }
                    }
                    // si los formatos y tamaños son correctos
                    if ($bandera1 && $bandera2){
                        // cargamos las fotos en la carpeta
                        for ($j=0; $j < $recorrido ; $j++) { 
                            $imagen = $_FILES['galeria']['tmp_name'][$j];
                            $archivo_subido = './imgsubidas/'.$_FILES['galeria']['name'][$j];
                            move_uploaded_file($imagen, $archivo_subido);
                        }


                    $galeria = json_encode($_FILES['galeria']['name']);
                    Post::subirGaleria($_POST['nombre'],$galeria);

                        
        
                    }

                }else{
                $error3 = 'Demasiadas imagenes. Máximo 3.';
                }
            }

require_once('vistas/clubes/clubmodificado.php');               
}






    //         ASOCIADO AL BUSCADOR
    ///////////////////////////////////////////////
    ///////////////////////////////////////////////

    public function buscar(){
        $buscar = $_POST['busqueda'];
        if($buscar != ""){
        $posts = Post::busqueda($buscar);
        
        if (empty($posts)){
            require_once('vistas/clubes/noclub.php');       
        }else{
            require_once('vistas/clubes/busqueda.php');
        }

        }else{
            require_once('vistas/clubes/inicio.php'); 
        }
    }


}



?>
