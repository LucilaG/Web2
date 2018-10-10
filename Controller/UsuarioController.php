<?php
require_once  "./View/UsuarioView.php";
require_once  "./Model/UsuarioModel.php";

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

  function MostrarUsuario(){
      $Usuarios = $this->model->GetUsuario();
      $this->view->Mostrar($this->Titulo, $Usuarios);
  }



  function InsertUsuario(){
    $nombre = $_POST["nombre"];
    $pass = $_POST["pass"];


    $this->model->InsertarUsuario($nombre,$pass);

    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }

}

 ?>
