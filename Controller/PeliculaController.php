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
    if(isset($_SESSION["User"])){
      $this->view->Mostrar($this->Titulo, $Peliculas,null,"User");
    }else{
      $this->view->Mostrar($this->Titulo, $Peliculas,null,null);
    }
  }
  function MostrarPelicula($param){
    $id_pelicula = $param[0];
    $Peliculas = $this->model->GetPelicula($id_pelicula);
    if(isset($_SESSION["User"])){
      $this->view->Mostrar($this->Titulo, $Peliculas,null,"User");
    }else{
      $this->view->Mostrar($this->Titulo, $Peliculas,null,null);
    }
  }

  function MostrarPeliculasPorCine($param){
    $id_cine = $param[0];
    $Peliculas = $this->model->GetPeliculas();
    if(isset($_SESSION["User"])){
      $this->view->Mostrar($this->Titulo, $Peliculas,$id_cine,"User");
    }else{
      $this->view->Mostrar($this->Titulo, $Peliculas,$id_cine,null);
    }
  }

  function EditarPelicula($param){
      $id_pelicula = $param[0];

      $Pelicula = $this->model->GetPelicula($id_pelicula);
      $this->view->MostrarEditarPelicula("Editar Pelicula", $Pelicula);
  }

  function InsertPelicula(){
    $nombre = $_POST["nombre"];
    $director = $_POST["director"];
    $rate = $_POST["rate"];
    $horarios = $_POST["horarios"];

    
    $this->model->InsertarPelicula($nombre,$director,$rate,$horarios);

    header(HOME);
  }

  function GuardarEditarPelicula(){
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $director = $_POST["director"];
    $rate = $_POST["rate"];
    $horarios = $_POST["horarios"];

    $this->model->GuardarEditarPelicula($id, $nombre,$director,$rate,$horarios);

    header(HOME);
  }

  function BorrarPelicula($param){
    $this->model->BorrarPelicula($param[0]);
    header(HOME);
  }
}

 ?>
