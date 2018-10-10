<?php

require_once "Api.php";
require_once "./../model/PeliculaModel.php";

class PeliculasApiController extends Api{

  private $model;
  function __construct(){
    parent::__construct();
    $this->model = new PeliculasModel();
  }

  function GetPeliculas($param = null){

    if(isset($param)){
      $id_pelicula = $param[0];
      $data = $this->model->GetPelicula($id_pelicula);
    }else{
      $data = $this->model->GetPeliculas();
    }
      if(isset($data)){
        return $this->json_response($data, 200);
      }else{
        return $this->json_response(null, 404);
      }
  }

}
 ?>
