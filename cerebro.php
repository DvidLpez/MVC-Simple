<?php
  function call($controlador, $accion) {
    require_once('controladores/' . $controlador . '_controlador.php');

    switch($controlador) {
      case 'clubes':
      require_once ('modelos/clubes.php');
        $controlador = new ClubesControlador();
      break;
      
      // Aqui se pondrian más controladores

    }

    $controlador->{ $accion }();
  }

  // Añadimos modulos y vistas de los controladores
  $controladores = array(

    // modulo y funciones del controlador
      'clubes' => [ 'inicio',
                    'error',
                    'form',
                    'comprobacion',
                    'individual',
                    'modificar',
                    'modificacion',
                    'eliminar',
                    'index',
                    'preborrar',
                    'buscar'
                    ]);

  if (array_key_exists($controlador, $controladores)) {
    if (in_array($accion, $controladores[$controlador])) {
      call($controlador, $accion);
    } else {
      call('clubes', 'error');
    }
  } else {
    call('clubes', 'error');
  }
?>