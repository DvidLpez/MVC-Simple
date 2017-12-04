<?php  
class Post{
	//definimos las columnas de la ddbb
	public $nombre;
	public $fundado;
	public $socios;
	public $estadio;
	public $pais;
	public $liga;
  public $priequipacion;
  public $segequipacion;
  public $imagen;

  //       CONSTRUCTOR
  /////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////

	public function __construct($nombre,$fundado,$socios,$estadio,$pais,$liga,$priequipacion,$segequipacion,$imagen){
		$this->nombre = $nombre;
		$this->fundado = $fundado;
		$this->socios = $socios;
		$this->estadio = $estadio;
		$this->pais = $pais;
		$this->liga = $liga;
    $this->priequipacion = $priequipacion;
    $this->segequipacion = $segequipacion;
    $this->imagen = $imagen;
	
	}

  //       ENCONTRAR TODOS LOS POST
  //////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////

	public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM clubes');
      
      foreach($req->fetchAll() as $post) {
        $list[] = new Post(
        $post['nombre'],
        $post['fundado'],
        $post['socios'],
        $post['estadio'],
        $post['pais'],
        $post['liga'],
        $post['primera_equipacion'],
        $post['segunda_equipacion'],
        $post['imagen']
        );
      }
     
      // echo json_encode($list);
      return $list;
    }


  //NOS DICE SI TENEMOS EL CLUB INSERTADO NOS DEVUELVE 1 O 0.
  /////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////


    public static function find($nombre) {
      $db = Db::getInstance();
      $req = $db->prepare('SELECT count(*) as total FROM clubes WHERE nombre = :nombre');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('nombre' => $nombre));
      $post = $req->fetch();
      return $post['total'];
    }


    //    CONTAMOS EL TOTAL DE CLUBES
    //////////////////////////////////////////////////////
    //////////////////////////////////////////////////////

    public static function contar() {
      $db = Db::getInstance();
      $req = $db->prepare('SELECT count(*) as total FROM clubes');
      $req->execute(array());
      $post = $req->fetch();
      return $post['total'];
    }


    //      MUESTRA UN POST INDIVIDUAL
    /////////////////////////////////////////////////////
    /////////////////////////////////////////////////////

    public static function individual($nombre) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $req = $db->prepare('SELECT * FROM clubes WHERE nombre = :nombre');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('nombre' => $nombre));
      $post = $req->fetch();

      return new Post($post['nombre'], $post['fundado'], $post['socios'], $post['estadio'], $post['pais'], $post['liga'], $post['primera_equipacion'], $post['segunda_equipacion'], $post['imagen']);
    }


    //    OBTENEMOS LA GALERIA DEL POST
    //////////////////////////////////////////////////////
    ////////////////////////////////////////////////////// 

    public static function galeria($nombre){
      $db = Db::getInstance();
      $req = $db->prepare('SELECT galeria FROM clubes WHERE nombre = :nombre');
      $req->execute(array('nombre' => $nombre));
      $post = $req->fetch();
      return $post;

    }

    //        INSERTA EN LA BBDD EL CLUB
    //////////////////////////////////////////////////////
    //////////////////////////////////////////////////////

    public static function addbd($nombre,$fundado,$socios,$estadio,$pais,$liga,$priequipacion,$segequipacion, $imagen,$galeria){
        $db = Db::getInstance();
        $statement = $db->prepare('INSERT INTO clubes VALUES (:nombre,:fundado,:socios, :estadio, :pais, :liga, :priequipacion, :segequipacion, :imagen, :galeria)');
        $statement->execute(array(
            'nombre'=>$nombre,
            'fundado'=>$fundado,
            'socios'=>$socios,
            'estadio'=> $estadio,
            'pais'=>$pais,
            'liga'=>$liga,
            'priequipacion'=>$priequipacion,
            'segequipacion'=>$segequipacion,
            'imagen'=>$imagen,
            'galeria'=>$galeria
          ));
    }

    //        ELIMINA EL CLUB
    //////////////////////////////////////////////////////
    //////////////////////////////////////////////////////

    public static function eliminar($nombre) {
      $db = Db::getInstance();
      $req = $db->prepare('DELETE FROM clubes WHERE nombre = :nombre');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('nombre' => $nombre));
    }


    //        MODIFICA EL CLUB
    ///////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////

    public static function modificacion($nombre,$fundado,$socios,$estadio,$pais,$liga,$priequipacion,$segequipacion){
        $db = Db::getInstance();
        $statement = $db->prepare('UPDATE clubes SET fundado = :fundado, socios = :socios, estadio = :estadio, pais = :pais, liga = :liga, primera_equipacion = :priequipacion, segunda_equipacion = :segequipacion WHERE nombre = :nombre');
        $statement->execute(array(
            'nombre'=>$nombre,
            'fundado'=>$fundado,
            'socios'=>$socios,
            'estadio'=> $estadio,
            'pais'=>$pais,
            'liga'=>$liga,
            'priequipacion'=>$priequipacion,
            'segequipacion'=>$segequipacion
          ));
    }

    //        SUBE LA IMAGEN SI SE MODIFICA
    /////////////////////////////////////////////////////
    /////////////////////////////////////////////////////

    public static function subirImagen($nombre,$imagen){
        $db = Db::getInstance();
        $statement = $db->prepare('UPDATE clubes SET imagen = :imagen WHERE nombre = :nombre');
        $statement->execute(array(
            'nombre' => $nombre,
            'imagen'=>$imagen
          ));
    }


    //        SUBE LA GALERIA SI SE MODIFICA
    /////////////////////////////////////////////////////
    /////////////////////////////////////////////////////

    public static function subirGaleria($nombre,$galeria){
       $db = Db::getInstance();
        $statement = $db->prepare('UPDATE clubes SET galeria = :galeria WHERE nombre = :nombre');
        $statement->execute(array(
            'galeria'=>$galeria,
            'nombre'=>$nombre
            ));
    }

    


    public function modificar(){
    $club = $_GET['nombre'];
    require_once('vistas/clubes/modificar.php');
    }

    //      NOS DICE LA PAGINA ACTUAL
    //////////////////////////////////////////////////////
    //////////////////////////////////////////////////////

    public static function pagina_actual(){
      // si get esta iniciada con p entonces obtenemos el interger de otra forma retornamos 1
      return isset($_GET['p']) ? (int)$_GET['p'] : 1;
    }


    //      TRAER LOS POST QUE QUEREMOS PARA LA PAGINACION
    /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////

      public static function obtener_post($inicio, $post_por_pagina){
        $list = [];
        $conexion = Db::getInstance();
        $req = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM clubes LIMIT $inicio , $post_por_pagina");
        $req->execute();     
            foreach($req->fetchAll() as $post) {
              $list[] = new Post(
              $post['nombre'],
              $post['fundado'],
              $post['socios'],
              $post['estadio'],
              $post['pais'],
              $post['liga'],
              $post['primera_equipacion'],
              $post['segunda_equipacion'],
              $post['imagen']
              );
            }
      return $list;
      }

      //          BUSCAR EL POST EN EL BUSCADOR
      /////////////////////////////////////////////////////////
      /////////////////////////////////////////////////////////

      public static function busqueda($buscar){
        $list = [];
        $conexion = Db::getInstance();
        $req = $conexion->prepare('SELECT * FROM clubes WHERE nombre LIKE :busqueda');
        $req->execute(array(':busqueda' => "%$buscar%"));
        foreach($req->fetchAll() as $post) {
              $list[] = new Post(
              $post['nombre'],
              $post['fundado'],
              $post['socios'],
              $post['estadio'],
              $post['pais'],
              $post['liga'],
              $post['primera_equipacion'],
              $post['segunda_equipacion'],
              $post['imagen']
              );
            }
      return $list;
      }

}
?>