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

      $sentencia = $this->db->prepare( "select * from pelicula where id=?");
      $sentencia->execute(array($id));
      return $sentencia->fetch(PDO::FETCH_ASSOC);
  }
  

  function InsertarPeliculas($nombre,$director,$rate,$horarios){

    $sentencia = $this->db->prepare("INSERT INTO pelicula( nombre,director,rate,horarios) VALUES(?,?,?)");
    $sentencia->execute(array($nombre,$director,$rate,$horarios));
  }

  function BorrarPeliculas($idPelicula){

    $sentencia = $this->db->prepare( "delete from pelicula where id=?");
    $sentencia->execute(array($idPelicula));
  }

  function GuardarEditarPeliculas($id, $nombre,$director,$rate,$horarios){
    $sentencia = $this->db->prepare( "update pelicula set nombre = ?, director = ?, rate = ?, horarios = ?, where id=?");
    $sentencia->execute(array($nombre,$director,$rate,$horarios));
  }
}


 ?>
