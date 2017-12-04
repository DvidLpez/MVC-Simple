<?php
  class Db {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance() {
          ////////////////////////////////////////////////////////////////////////////////////////////////////////
          // 
          //    1.- CONEXION POR PDO UNA MANERA DE HACERLO
          // 
          // 
          //
          //    if (!isset(self::$instance)) {
          //      $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
          //      self::$instance = new PDO('mysql:host=localhost;dbname=equipos_futbol', 'user', 'password', $pdo_options);
          //    }
          //    return self::$instance;
          //           
          // 
          ////////////////////////////////////////////////////////////////////////////////////////////////////////


          ////////////////////////////////////////////////////////////////////////////////////////////////////////
          //
          //    2.- CONEXION POR PDO CON ESTRUCTURA TRY CATCH FINALLY
          //
          // 
          // 
          //
                      try {
                          self::$instance = new PDO("mysql:host=localhost;dbname=equipos_futbol",'user','password');
                        return self::$instance;
                      } catch (PDOException $e) {
                          print "¡Error!: " . $e->getMessage() . " ";    
                          die();
                        return $e;
                      }finally{
                         self::$instance =null;
                      }
          //  
          //
          //
          ////////////////////////////////////////////////////////////////////////////////////////////////////////


  }
}


  


?>
