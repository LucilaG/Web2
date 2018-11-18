<?php

require_once "Api.php";
require_once "./../model/CineModel.php";

class CineApiController extends Api
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
    $this->Titulo = "Cine";
  }

  function GetCine($param = null){

    if(isset($param)){
      $id_cine = $param[0];
      $data = $this->model->GetCine($id_Cine);
        $id_Cine = $param[0];
        $arreglo = $this->model->GetCine($id_Cine);

        if(count($param)==2 && $param[1] == "description"){
          $data = $arreglo;
        }


    }else{
      $data = $this->model->GetCines();
    }
      }
  }

  function DeleteCine($param = null){
    if(count($param) == 1){
        $id_cine = $param[0];
        $r =  $this->model->BorrarCine($id_cine);
        if($r == false){
          return $this->json_response($r, 300);
        }

        return $this->json_response($r, 200);
    }else{
      return  $this->json_response("No task specified", 300);
    }
  }

  function InsertarCine($param = null){

    $objetoJson = $this->getJSONData();
    $r = $this->model->InsertCine($objetoJson->id, $objetoJson->cine, $objetoJson->puntaje,$objetoJson->id_cine );

    return $this->json_response($r, 200);
  }

  function UpdateCine($param = null){
    if(count($param) == 1){
      $idCine = $param[0];
      $objetoJson = $this->getJSONData();
      $r = $this->model->GuardarEditarCine($objetoJson->id, $objetoJson->Cine, $objetoJson->puntaje,$objetoJson->id_cine );
      return $this->json_response($r, 200);

    }else{
      return  $this->json_response("No task specified", 300);
    }

  }
}
 ?>
