<?php
require_once "Model/CreateDDBBModel.php";
/**
 *
 */
class PeliculaModel extends CreateDDBBModel
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

  function GetPeliculas(){

    $sentencia = $this->db->prepare( "SELECT * FROM pelicula");
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
}

function GetPelicula($id){

  $sentencia = $this->db->prepare( "SELECT * FROM pelicula WHERE id_pelicula=?");
  $sentencia->execute(array($id));
  return $sentencia->fetch(PDO::FETCH_ASSOC);
}

function GetPeliculaCondicion($rate){
  $sentencia = $this->db->prepare( "SELECT * FROM pelicula WHERE rate >= ?");
  $sentencia->execute(array($rate));
  return $sentencia->fetch(PDO::FETCH_ASSOC);
}

function InsertarPelicula($nombre,$director,$rate,$horarios,$id_cine){                                  
  $sentencia = $this->db->prepare("INSERT INTO pelicula (nombre, director, rate, horarios, id_cine) VALUES (?, ?, ?, ?,?);");
  $sentencia->execute(array($nombre,$director,$rate,$horarios,$id_cine));
}

function BorrarPelicula($idPelicula){
  $sentencia = $this->db->prepare( "DELETE FROM pelicula WHERE id_pelicula=?");
  $sentencia->execute(array($idPelicula));
}

function GuardarEditarPelicula($nombre,$director,$rate,$horarios,$id_cine,$id_pelicula){
  $sentencia = $this->db->prepare( "UPDATE pelicula SET nombre = ?, director = ?, rate = ?, horarios = ?, id_cine = ? WHERE id_pelicula = ?");
  $sentencia->execute(array($nombre,$director,$rate,$horarios,$id_cine,$id_pelicula));
}
}


 ?>
