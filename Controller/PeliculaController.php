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

    $this->view = new PeliculaView();
    $this->model = new PeliculaModel();
    $this->Titulo = "Lista de Peliculas";
  }

  function MostrarPeliculas(){
    $Peliculas = $this->model->GetPeliculas();
    $this->view->Mostrar($this->Titulo, $Peliculas);
  }

  function MostrarPeliculasPorCine($param){
    $id_cine = $param[0];
    $Peliculas = $this->model->GetPeliculas();
    $this->view->MostrarID($this->Titulo, $Peliculas, $id_cine);
  }

  function EditarPeliculas($param){
      $id_pelicula = $param[0];

      $Pelicula = $this->model->GetPelicula($id_pelicula);
      $this->view->MostrarEditarPeliculas("Editar Pelicula", $Pelicula);
  }

  function InsertPelicula(){
    $titulo = $_POST["tituloForm"];
   
    $nombre = $_POST["nombre"];
    $director = $_POST["director"];
    $rate = $_POST["rate"];
    $horarios = $_POST["horarios"];

    
    $this->model->InsertarPelicula($nombre,$director,$rate,$horarios);

    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }

  function GuardarEditarPelicula(){
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $director = $_POST["director"];
    $rate = $_POST["rate"];
    $horarios = $_POST["horarios"];

    $this->model->GuardarEditarPelicula($id, $nombre,$director,$rate,$horarios);

    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }

  function BorrarPelicula($param){
    $this->model->BorrarPelicula($param[0]);
    header("Location: http://".$_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]));
  }

  
}

 ?>
