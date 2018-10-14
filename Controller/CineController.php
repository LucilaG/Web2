<?php

require_once  "./View/CineView.php";
require_once  "./Model/CineModel.php";
require_once  "./Model/PeliculaModel.php";
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
    $this->modelPelicula = new PeliculaModel();
    $this->Titulo = "Lista de Cine";
  }

  function Home(){
      $Cines = $this->model->GetCines();
      $Pelicula = $this->modelPelicula->GetPeliculas();
      $this->view->Mostrar($this->Titulo, $Cines, $Pelicula);
  }

  function EditarCine($param){
      $id_cine = $param[0];

      $Cine = $this->model->GetCine($id_cine);
      $this->view->MostrarEditarCine("Editar Cine",$Cine);
  }
  
  function InsertCine(){
    $nombre = $_POST["nombre"];
    $capacidad = $_POST["capacidad"];
    $sala = $_POST["sala"];
    
    $this->model->InsertarCine($nombre,$capacidad,$sala);

    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }

  function GuardarEditarCine(){
    $id_cine = $_POST["id"];
    $nombre = $_POST["nombre"];
    $capacidad = $_POST["capacidad"];
    $sala = $_POST["sala"];

    $this->model->GuardarEditarCine($nombre,$capacidad,$sala,$id_cine);

    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }

  function BorrarCine($param){
    $this->model->BorrarCine($param[0]);
    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }
}

 ?>
