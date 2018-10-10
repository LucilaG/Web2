<?php
/**
 *
 */
class CinesModel
{
  private $db;

  function __construct()
  {
    $this->db = $this->Connect();
  }

  function Connect(){
    return new PDO('mysql:host=localhost;'
    .'dbname=cine;charset=utf8'
    , 'root', '');
  }

  function GetCines(){

      $sentencia = $this->db->prepare( "select * from cine");
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }

  function GetCine($id){

      $sentencia = $this->db->prepare( "select * from cine where id=?");
      $sentencia->execute(array($id));
      return $sentencia->fetch(PDO::FETCH_ASSOC);
  }

  function InsertarCine($nombre,$capacidad,$sala){

    $sentencia = $this->db->prepare("INSERT INTO cine( nombre, capacidad, sala) VALUES(?,?,?)");
    $sentencia->execute(array($nombre,$capacidad,$sala));
  }

  function BorrarCine($idCine){

    $sentencia = $this->db->prepare( "delete from cine where id=?");
    $sentencia->execute(array($idCine));
  }

  function CompletarCine($id_cine){

    $sentencia = $this->db->prepare( "update cine set completada=1 where id=?");
    $sentencia->execute(array($id_cine));
  }

  function GuardarEditarCine($nombre,$capacidad,$sala,$id){
    $sentencia = $this->db->prepare( "update cine set nombre = ?, capacidad = ?, sala = ? where id=?");
    $sentencia->execute(array($nombre,$capacidad,$sala,$id));
  }
}


 ?>
