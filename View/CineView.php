<?php
require('libs/Smarty.class.php');

class CineView
{
  private $Smarty;

  function __construct()
  {
    $this->Smarty = new Smarty();
  }

  /*function Mostrar($Nombre, $Capacidad, $Sala){

    $this->Smarty->assign('Nombre',$Nombre); // El 'Titulo' del assign puede ser cualquier valor
    $this->Smarty->assign('Capacidad',$Capacidad);
    $this->Smarty->assign('Sala',$Sala);
    //$smarty->debugging = true;
    $this->Smarty->display('templates/home.tpl');
  }*/

  function Mostrar($Titulo, $cine){
    $smarty= new Smarty();
    $this->Smarty->assign('Titulo',$Titulo); // El 'Titulo' del assign puede ser cualquier valor
    $this->Smarty->assign('Cine',$cine);
    $this->Smarty->display('templates/home.tpl');
  }

  function MostrarEditarCine($Nombre, $Capacidad, $Sala){

    $this->Smarty->assign('Nombre',$Nombre); // El 'Titulo' del assign puede ser cualquier valor
    $this->Smarty->assign('Capacidad',$Capacidad);
    $this->Smarty->assign('Sala',$Sala);
    $this->Smarty->assign('home',"http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));

    //$smarty->debugging = true;
    $this->Smarty->display('templates/MostrarEditarCine.tpl');
  }

}

 ?>
