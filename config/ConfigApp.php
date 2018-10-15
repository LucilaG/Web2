<?php

define('HOME', 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
define('LOGIN', 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]). '/login');
define('LOGOUT', 'Location: http://'.$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]). '/logout');


class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
      ''=> 'MostrarController#MostrarHome',
      'home'=> 'MostrarController#MostrarHome',
      'contacto' =>'MostrarController#MostrarContacto',
      'cines'=> 'CineController#Cine',
      'borrar'=> 'CineController#BorrarCine',
      'borrarPelicula'=> 'PeliculaController#BorrarPelicula',
      'editar'=> 'CineController#EditarCine',
      'editarPelicula'=> 'PeliculaController#EditarPelicula',
      'guardarEditarPelicula'=> 'PeliculaController#GuardarEditarPelicula',
      'agregar'=> 'CineController#InsertCine',
      'peliculasPorCine' => 'PeliculaController#MostrarPeliculasPorCine',
      'peliculas' => 'PeliculaController#MostrarPeliculas',
      'pelicula' => 'PeliculaController#MostrarPelicula',
      'guardarEditar'=> 'CineController#GuardarEditarCine',
      'mostrarUsuarios'=> 'UsuarioController#MostrarUsuario',
      'login'=> 'LoginController#login',
      'verificarLogin' => 'LoginController#verificarLogin',
      'logout'=> 'LoginController#logout',
    ];

}

 ?>
