<?php

require_once "Api.php";
require_once "./../model/CineModel.php";

class CineApiController extends Api{

  private $model;
  function __construct(){
    parent::__construct();
    $this->model = new CineModel();
  }

  function Cine(){
    $Cines = $this->model->GetCines();
    $Pelicula = $this->modelPelicula->GetPeliculas();             
      $User = $this->chequearUser();
      $this->view->Mostrar($this->Titulo, $Cines, $Pelicula, $User);
    
}
 ?>
