<?php

class PeliculaView
{
  private $Smarty;

  function __construct()
  {
    $this->Smarty = new Smarty();
  }

  function Mostrar($Titulo, $Pelicula){
    $this->Smarty->assign('Titulo',$Titulo); // El 'Titulo' del assign puede ser cualquier valor
    $this->Smarty->assign('Peliculas', $Pelicula);
    $this->Smarty->display('templates/pelicula.tpl');
  }
  function MostrarID($Titulo, $Pelicula, $id_cine){
    $this->Smarty->assign('Titulo',$Titulo); // El 'Titulo' del assign puede ser cualquier valor
    $this->Smarty->assign('Peliculas', $Pelicula);
    $this->Smarty->assign('id_cine', $id_cine);
    $this->Smarty->display('templates/pelicula.tpl');
  }
  

  function MostrarEditarPelicula($nombre,$director,$rate,$horarios){

    $this->Smarty->assign('Nombre',$nombre); // El 'Titulo' del assign puede ser cualquier valor
    $this->Smarty->assign('Director',$director);
    $this->Smarty->assign('Rate',$rate);
    $this->Smarty->assign('Horarios',$horarios);
    $this->Smarty->assign('home',"http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));

    //$smarty->debugging = true;
    $this->Smarty->display('templates/MostrarEditarPelicula.tpl');
  }

}

 ?>
