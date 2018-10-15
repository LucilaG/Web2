<?php

class PeliculaView
{
  private $Smarty;

  function __construct()
  {
    $this->Smarty = new Smarty();
  }

  function Mostrar($Titulo, $Pelicula, $id_cine, $User){
    $this->Smarty->assign('Titulo',$Titulo); // El 'Titulo' del assign puede ser cualquier valor
    $this->Smarty->assign('Peliculas', $Pelicula);
    $this->Smarty->assign('id_cine', $id_cine);
    $this->Smarty->assign('User', $User);
    $this->Smarty->display('templates/pelicula.tpl');
  }
  

  function MostrarEditarPelicula($Titulo,$Pelicula){
    $this->Smarty->assign('Titulo',$Titulo);
    $this->Smarty->assign('Pelicula',$Pelicula);
    $this->Smarty->assign('home',"http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));

    $this->Smarty->display('templates/MostrarEditarPelicula.tpl');
  }

}

 ?>
