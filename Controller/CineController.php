<?php

require_once  "./View/CineView.php";
require_once  "./Model/CineModel.php";
require_once  "SecuredController.php";

class CineController extends SecuredController
{
  private $view;
  private $model;
  private $Titulo;

  function __construct()
  {
    parent::__construct();

    $this->view = new CineView();
    $this->model = new CineModel();
    $this->Titulo = "Lista de Cine";
  }

  function Home(){
      $Cines = $this->model->GetCines();
      $this->view->Mostrar($this->Titulo, $Cines);
  }

  function EditarCines($param){
      $id_cine = $param[0];

      $Cine = $this->model->GetCine($id_cine);
      $this->view->MostrarEditarCine("Editar Cine", $Cine);
  }

  function InsertCine(){
    $titulo = $_POST["tituloForm"];
    $descripcion = $_POST["descripcionForm"];

    
    $this->model->InsertarCine($nombre,$capacidad,$sala);

    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }

  function GuardarEditarCine(){
    $id_cine = $_POST["idForm"];
    $titulo = $_POST["tituloForm"];
    $descripcion = $_POST["descripcionForm"];

    $this->model->GuardarEditarCine($nombre,$capacidad,$sala,$id_cine);

    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }

  function BorrarCine($param){
    $this->model->BorrarCine($param[0]);
    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }
}

 ?>
