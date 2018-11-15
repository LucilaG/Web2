<?php
require_once  "./View/UsuarioView.php";
require_once  "./Model/UsuarioModel.php";
require_once  "SecuredController.php";

class UsuarioController extends SecuredController
{
  private $view;
  private $model;
  private $Titulo;

  function __construct()
  {
    parent::__construct();
    
    $this->view = new UsuarioView();
    $this->model = new UsuarioModel();
    $this->Titulo = "Lista de Usuario";
  }

  function MostrarUsuarios(){    
      
      if(isset($_SESSION["User"])){
        $Usuarios = $this->model->GetUsuarios();        
        $User = $_SESSION["User"];
        $this->view->MostrarUsers($this->Titulo, $Usuarios,$User);
      }else{
        header(LOGIN);
      }

  }

  

  function registro(){
    if(isset($_SESSION["User"])){        
      $User = $_SESSION["User"];
      $this->view->mostrarRegistro($User);
    }else{
      $this->view->mostrarRegistro(null);
    }
  }

  function InsertUsuario(){
    $nombre = $_POST["nombre"];
    $pass = $_POST["pass"];
    $hash = password_hash($pass, PASSWORD_DEFAULT);

    $dbUser = $this->model->getUser($nombre);
    if(empty($dbUser)){
      $this->model->InsertarUsuario($nombre,$hash);
      $_SESSION["User"] = $nombre;
      header(HOME);
    }else{
      $this->view->mostrarRegistro(null);
    }    
  }
}

 ?>
