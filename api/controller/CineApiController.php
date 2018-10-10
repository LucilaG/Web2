<?php

require_once "Api.php";
require_once "./../model/CineModel.php";

class CinesApiController extends Api{

  private $model;
  function __construct(){
    parent::__construct();
    $this->model = new CinesModel();
  }

  function GetCines($param = null){

    if(isset($param)){
      $id_cine = $param[0];
      $data = $this->model->GetCine($id_cine);
    }else{
      $data = $this->model->GetCines();
    }
      if(isset($data)){
        return $this->json_response($data, 200);
      }else{
        return $this->json_response(null, 404);
      }
  }

}
 ?>
