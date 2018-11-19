<?php

require_once "Api.php";
require_once "./../Model/ComentarioModel.php";

class ComentarioApiController extends Api
{
  private $model;
  private $Titulo;

  function __construct(){
    
    parent::__construct();
    $this->model = new ComentarioModel();
    $this->Titulo = "Comentario";
  }

  function GetComentario($param = null){
    if(isset($param)){
      $id_comentario = $param[0];
      $arreglo = $this->model->GetComentarios($id_comentario);
      $data = $arreglo;
    }else{
      $data = $this->model->GetComentario();
    }
    if(isset($data)){
      return $this->json_response($data, 200);
    }else{
      return $this->json_response(null, 404);
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
    $r = $this->model->InsertComentario($objetoJson->id, $objetoJson->Comentario, $objetoJson->puntaje,$objetoJson->id_comentario );

    return $this->json_response($r, 200);
  }

  function UpdateComentario($param = null){
    if(count($param) == 1){
      $idComentario = $param[0];
      $objetoJson = $this->getJSONData();
      $r = $this->model->GuardarEditarComentario($objetoJson->id, $objetoJson->Comentario, $objetoJson->puntaje,$objetoJson->id_comentario );
      return $this->json_response($r, 200);

    }else{
      return  $this->json_response("No task specified", 300);
    }
  }
  
}
 ?>
