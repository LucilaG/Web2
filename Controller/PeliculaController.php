<?php

require_once  "./View/PeliculaView.php";
require_once  "./Model/PeliculaModel.php";
require_once  "SecuredController.php";

class PeliculaController extends SecuredController
{
  private $view;
  private $model;
  private $Titulo;

  function __construct()
  {
    parent::__construct();

    $this->view = new PeliculasView();
    $this->model = new PeliculasModel();
    $this->Titulo = "Lista de Tareas Controlador 1";
  }

  function Home(){
      $Peliculas = $this->model->GetPeliculas();
      $this->view->Mostrar($this->Titulo, $Peliculas);
  }

  function EditarPeliculas($param){
      $id_pelicula = $param[0];

      $Pelicula = $this->model->GetPelicula($id_pelicula);
      $this->view->MostrarEditarPeliculas("Editar Tarea", $Pelicula);
  }

  function InsertPelicula(){
    $titulo = $_POST["tituloForm"];
    $descripcion = $_POST["descripcionForm"];

    
    $this->model->InsertarPelicula($nombre,$director,$rate,$horarios);

    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }

  function GuardarEditarPelicula(){
    $id_pelicula = $_POST["idForm"];
    $titulo = $_POST["tituloForm"];
    $descripcion = $_POST["descripcionForm"];

    $this->model->GuardarEditarPelicula($nombre,$director,$rate,$horarios,$id_pelicula);

    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }

  function BorrarPelicula($param){
    $this->model->BorrarPelicula($param[0]);
    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }

  
}

 ?>
