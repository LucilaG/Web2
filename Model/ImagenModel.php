<?php
require_once "Model/CreateDDBBModel.php";
/**
 *
 */
class ImagenModel extends CreateDDBBModel
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

  function insert($id_pelicula, $url){
    $sentencia = $this->db->prepare("INSERT INTO imagen(id_pelicula, url) VALUES (?,?)");
    $sentencia->execute(array($id_pelicula, $url));
  }
  function getByPelicula($id_pelicula){
    $sentencia = $this->db->prepare("SELECT * FROM imagen i, pelicula p WHERE i.id_pelicula=p.id_pelicula and p.id_pelicula=?");
    $sentencia->execute(array($id_pelicula[0]));
    return $sentencia->fetchAll(PDO::FETCH_ASSOC);
  }
  //Asigna un codigo unico a la imagen y la mueve al servidor
  function subirImagen($imagen){
       $destino_final = 'images/' . uniqid() . '.jpg';
       // echo "destino_final: ".$destino_final;
       move_uploaded_file($imagen, $destino_final);
       return $destino_final;
   }
   //Se le pasa un ID de imagen a la funcion y devuelve la URL.
   function getUrl($id_imagen){
     $sentencia = $this->db->prepare("SELECT url FROM imagen WHERE id_imagen = ?");
     $sentencia->execute(array($id_img[0]));
     return $sentencia->fetch(PDO::FETCH_ASSOC);
   }
   //Funcion para eliminar una imagen, también se debe eliminar el archivo del servidor
   //Alojado en images
   function BorrarImagen($id_imagen){
     $url = $this->getUrl($id_imagen);
     unlink($url['url']);
     $sentencia = $this->db->prepare("DELETE FROM imagen WHERE id_imagen=?");
     $sentencia->execute(array($id_imagen[0]));
   }
}
 ?>