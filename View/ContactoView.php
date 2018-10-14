<?php

class ContactoView
{
  private $Smarty;

  function __construct()
  {
    $this->Smarty = new Smarty();
  }

  function Mostrar(){
    $this->Smarty->display('templates/contacto.tpl');
  }

}

 ?>