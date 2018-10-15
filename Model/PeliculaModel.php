<?php
/**
 *
 */
class PeliculaModel
{
  private $db;

  function __construct()
  {
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
  

function InsertarPelicula($nombre,$director,$rate,$horarios){                                  
  $sentencia = $this->db->prepare("INSERT INTO `pelicula` (`nombre`, `director`, `rate`, 'horarios') VALUES (?, ?, ?, ?);");
  $sentencia->execute(array($nombre,$director,$rate,$horarios));
}

function BorrarPelicula($idPelicula){
  $sentencia = $this->db->prepare( "DELETE FROM pelicula WHERE id_pelicula=?");
  $sentencia->execute(array($idPelicula));
}

function GuardarEditarPelicula($nombre,$director,$rate,$horarios,$id){
  $sentencia = $this->db->prepare( "UPDATE `pelicula` SET `nombre`=?,`director`=?,`rate`=?,`horarios`=?  WHERE id_pelicula=?");
  $sentencia->execute(array($nombre,$director,$rate,$horarios,$id));
}
}


 ?>
