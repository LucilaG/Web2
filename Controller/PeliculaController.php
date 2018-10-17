<?php

require_once  "./View/PeliculaView.php";
require_once  "./Model/PeliculaModel.php";
require_once  "./Model/CineModel.php";
require_once  "SecuredController.php";

class PeliculaController extends SecuredController
{
  private $view;
  private $model;  
  private $modelCine;
  private $Titulo;

  function __construct()
  {
    parent::__construct();

    $this->view = new PeliculaView();
    $this->model = new PeliculaModel();
    $this->modelCine = new CineModel();
    $this->Titulo = "Lista de Peliculas";
  }
 
  function MostrarPeliculas(){
    $Peliculas = $this->model->GetPeliculas();
    if(isset($_SESSION["User"])){
      $this->view->MostrarPeliculas($this->Titulo, $Peliculas,"User",true);
    }else{
      $this->view->MostrarPeliculas($this->Titulo, $Peliculas,null,true);
    }
  }
  function MostrarPelicula($param){
    $id_pelicula = $param[0];
    $Peliculas = $this->model->GetPelicula($id_pelicula);   
    if(isset($_SESSION["User"])){
      $this->view->MostrarPeliculas($this->Titulo, $Peliculas,"User",false);
    }else{
      $this->view->MostrarPeliculas($this->Titulo, $Peliculas,null,false);  
    }
  }

  function MostrarPeliculasPorCine($param){
    $id_cine = $param[0];
    $Peliculas = $this->model->GetPeliculas();    
    $Cines = $this->modelCine->GetCines();
    if(isset($_SESSION["User"])){
      $this->view->Mostrar($this->Titulo, $Peliculas,$id_cine,"User",$Cines);
    }else{
      $this->view->Mostrar($this->Titulo, $Peliculas,$id_cine,null,$Cines);
    }
  }

  function EditarPelicula($param){
    if(isset($_SESSION["User"])){
      $User = $_SESSION["User"];
      $id_pelicula = $param[0];

      $Pelicula = $this->model->GetPelicula($id_pelicula);
      $Cines = $this->modelCine->GetCines();
      $this->view->MostrarEditarPelicula("Editar Pelicula", $Pelicula, "User",$Cines);
    }else{
      header(LOGIN);
    }
  }

  function InsertPelicula(){
    $nombre = $_POST["nombre"];
    $director = $_POST["director"];
    $rate = $_POST["rate"];
    $horarios = $_POST["horarios"];
    $id_cine = $_POST["id_cine"];


    $this->model->InsertarPelicula($nombre,$director,$rate,$horarios,$id_cine);

    header(PELICULASCINE.$id_cine);
  }

  function GuardarEditarPelicula(){
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $director = $_POST["director"];
    $rate = $_POST["rate"];
    $horarios = $_POST["horarios"];
    $id_cine = $_POST["id_cine"];;

    $this->model->GuardarEditarPelicula($nombre,$director,$rate,$horarios,$id_cine,$id);

    header(PELICULASCINE.$id_cine);
  }

  function BorrarPelicula($param){
    $this->model->BorrarPelicula($param[0]);
    header(PELICULASCINE.$id_cine);
  }
}

 ?>
