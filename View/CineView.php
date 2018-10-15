<?php
require('libs/Smarty.class.php');

class CineView
{
  private $Smarty;

  function __construct()
  {
    $this->Smarty = new Smarty();
  }

  function Mostrar($Titulo, $Cines, $Pelicula, $User){
    $smarty= new Smarty();
    $this->Smarty->assign('Titulo',$Titulo); // El 'Titulo' del assign puede ser cualquier valor
    $this->Smarty->assign('Cines',$Cines);
    $this->Smarty->assign('Peliculas', $Pelicula);
    $this->Smarty->assign('User', $User);
    $this->Smarty->display('templates/cine.tpl');

  }

  function MostrarEditarCine($Titulo,$Cine){
    $this->Smarty->assign('Titulo',$Titulo); 
    $this->Smarty->assign('Cine',$Cine); 
    $this->Smarty->assign('cine',"http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));

    //$smarty->debugging = true;
    $this->Smarty->display('templates/MostrarEditarCine.tpl');
  }

}

 ?>
