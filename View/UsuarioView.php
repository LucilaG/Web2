<?php

class UsuarioView
{
  private $Smarty;

  function __construct()
  {
    $this->Smarty = new Smarty();
  }

  function mostrarRegistro($message = '', $User = ''){
    $this->Smarty->assign('Titulo',"Registro");
    $this->Smarty->assign('Message',$message);
    $this->Smarty->assign('User', $User);
    
    $this->Smarty->display('templates/registro.tpl');
  }

  function MostrarUsers($Titulo,$Usuarios='',$User=''){
    $this->Smarty->assign('Titulo',$Titulo);
    $this->Smarty->assign('Usuarios',$Usuarios);    
    $this->Smarty->assign('User',$User);

    $this->Smarty->display('templates/MostrarUsuarios.tpl');
  }
}

 ?>
