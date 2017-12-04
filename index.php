<?php
require_once('conexion.php');

if (isset($_GET['controlador']) && isset($_GET['accion'])) {
    $controlador = $_GET['controlador'];
    $accion     = $_GET['accion'];
  } else {
    $controlador = 'clubes';
    $accion     = 'inicio';
  }

  require_once('vistas/vista-index.php');
 ?>

 