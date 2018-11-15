<?php

define('HOME', 'Location: home');
define('LOGIN', 'Location: login');
define('LOGOUT', 'Location: logout');
define('CINES', 'Location: cines');
define('PELICULAS', 'Location: peliculas');
define('PELICULASCINE', 'Location: peliculasPorCine/');


class ConfigApp
{
    public static $ACTION = 'action';
    public static $PARAMS = 'params';
    public static $ACTIONS = [
      ''=> 'MostrarController#MostrarHome',
      'home'=> 'MostrarController#MostrarHome',
      'contacto' =>'MostrarController#MostrarContacto',
      'cines'=> 'CineController#Cine',
      'alertBorrar'=> 'CineController#OpcionBorrarCine',
      'borrar'=> 'CineController#borrarCine',
      'borrarPelicula'=> 'PeliculaController#BorrarPelicula',
      'editar'=> 'CineController#EditarCine',
      'editarPelicula'=> 'PeliculaController#EditarPelicula',
      'guardarEditarPelicula'=> 'PeliculaController#GuardarEditarPelicula',
      'agregar'=> 'CineController#InsertCine',
      'agregarPelicula'=> 'PeliculaController#InsertPelicula',
      'peliculasPorCine' => 'PeliculaController#MostrarPeliculasPorCine',
      'peliculas' => 'PeliculaController#MostrarPeliculas',
      'pelicula' => 'PeliculaController#MostrarPelicula',
      'guardarEditar'=> 'CineController#GuardarEditarCine',
      'usuarios'=> 'UsuarioController#MostrarUsuarios',
      'login'=> 'LoginController#login',
      'verificarLogin' => 'LoginController#verificarLogin',
      'registro'=> 'UsuarioController#registro',
      'insertarUsuario'=> 'UsuarioController#InsertUsuario',
      'logout'=> 'LoginController#logout',
    ];

}

 ?>
