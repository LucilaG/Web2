<?php

define('HOME', 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
define('LOGIN', 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]). '/login');
define('LOGOUT', 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]). '/logout');


class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
      ''=> 'CineController#Home',
      'home'=> 'CineController#Home',
      'borrar'=> 'CineController#BorrarCine',
      'editar'=> 'CineController#EditarCine',
      'agregar'=> 'CineController#InsertCine',
      'peliculasPorCine' => 'PeliculaController#MostrarPeliculasPorCine',
      'peliculas' => 'PeliculaController#MostrarPeliculas',
      'guardarEditar'=> 'CineController#GuardarEditarCine',
      'mostrarUsuarios'=> 'UsuarioController#MostrarUsuario',
      'login'=> 'LoginController#login',
      'verificarLogin' => 'LoginController#verificarLogin',
      'logout'=> 'LoginController#logout',
    ];

}

 ?>
