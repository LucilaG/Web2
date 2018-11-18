<?php
require_once "CreateDDBBModel.php";
/**
 *
 */
class ComentarioModel extends CreateDDBBModel
{
  private $db;

  function __construct()
  {
    parent::__construct();
    $this->db = $this->Connect();
  }

  function Connect(){
    return new PDO('mysql:host=localhost;'
    .'dbname=db_cine;charset=utf8'
    , 'root', '');
  }

  function GetComentario(){

      $sentencia = $this->db->prepare( "SELECT * FROM comentario");
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function InsertarComentario($id, $comentario, $puntaje,$id_cine){                                  
    $sentencia = $this->db->prepare("INSERT INTO `comentario`(`id`, `comentario`, `puntaje`, `id_cine`)  VALUES (?, ?, ?, ?);");
    $sentencia->execute(array($id, $comentario, $puntaje,$id_cine));
  }

  function eliminarPeliculas($idCine){
    
  }

  function DeleteComentario($idComentario){
    $sentencia = $this->db->prepare( "DELETE FROM comentario WHERE id_comentario=?");
    $sentencia->execute(array($idComentario));
  }

}


 ?>
