<?php

class HomeView
{
  private $Smarty;

  function __construct()
  {
    $this->Smarty = new Smarty();
  }

  function Mostrar(){
    $this->Smarty->assign('Titulo',"Inicio");
    $this->Smarty->display('templates/home.tpl');
  }

}

 ?>