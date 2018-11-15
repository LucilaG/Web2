<?php

require_once "Api.php";
require_once "./../model/TareasModel.php";

class TareasApiController extends Api{

  private $model;
  function __construct(){
    parent::__construct();
    $this->model = new TareasModel();
  }

  function GetTareas($param = null){

    if(isset($param)){
      $id_tarea = $param[0];
      $data = $this->model->GetTarea($id_tarea);
    }else{
      $data = $this->model->GetTareas();
    }
      if(isset($data)){
        return $this->json_response($data, 200);
      }else{
        return $this->json_response(null, 404);
      }
  }

}
 ?>
