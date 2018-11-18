<?php

require_once "Api.php";
require_once "./../model/ComentarioModel.php";

class ComentarioApiController extends Api
{
  private $view;
  private $model;
  private $Titulo;

  function __construct()
  {
    parent::__construct();
    $this->view = new ComentarioView();
    $this->model = new ComentarioModel();
    $this->modelPelicula = new PeliculaModel();
    $this->Titulo = "Comentario";
  }

  function GetComentario($param = null){

    if(isset($param)){
      $id_comentario = $param[0];
      $data = $this->model->GetComentario($id_comentario);
        $id_comentario = $param[0];
        $arreglo = $this->model->GetComentario($id_comentario);

        if(count($param)==2 && $param[1] == "description"){
          $data = $arreglo;
        }


    }else{
      $data = $this->model->GetComentarios();
    }
      }
  }

  function DeleteComentario($param = null){
    if(count($param) == 1){
        $id_comentario = $param[0];
        $r =  $this->model->BorrarComentario($id_comentario);
        if($r == false){
          return $this->json_response($r, 300);
        }

        return $this->json_response($r, 200);
    }else{
      return  $this->json_response("No task specified", 300);
    }
  }

  function InsertComentario($param = null){

    $objetoJson = $this->getJSONData();
    $r = $this->model->InsertComentario($objetoJson->id, $objetoJson->Comentario, $objetoJson->puntaje,$objetoJson->id_cine );

    return $this->json_response($r, 200);
  }

  function UpdateComentario($param = null){
    if(count($param) == 1){
      $idComentario = $param[0];
      $objetoJson = $this->getJSONData();
      $r = $this->model->GuardarEditarComentario($objetoJson->id, $objetoJson->Comentario, $objetoJson->puntaje,$objetoJson->id_cine );
      return $this->json_response($r, 200);

    }else{
      return  $this->json_response("No task specified", 300);
    }

  }
}
 ?>
