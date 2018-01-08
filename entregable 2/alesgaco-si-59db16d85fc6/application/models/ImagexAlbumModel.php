<?php

 class ImagexAlbumModel extends CI_Model{
  private $id="";
  private $orderNumber="";
  private $idImage="";
  private $idAlbum="";
function __construct(){

}
public function setData($data)
{
  if(isset($data['id'])){$this->id=$data['id'];}
  $this->orderNumber=$data['orderNumber'];
  $this->idImage=$data['idImage'];
  $this->idAlbum=$data['idAlbum'];
}

function setOrderNumber($Person_id){
$this->orderNumber=$Person_id;
}

function getOrderNumber(){
return $this->orderNumber;
}


function setId($Person_id){
$this->id=$Person_id;
}

function getId(){
return $this->id;
}

function seIdImage($tittle){
$this->idImage=$tittle;
}

function getIdImage(){
return $this->idImage;
}

function setIdAlbum($nickName){
$this->idAlbum=$nickName;
}

function getIdAlbum(){
return $this->idAlbum;
}

function insertar(){
  $this->db->set("idAlbum",$this->idAlbum)
            ->set("idImage",$this->idImage)
            ->set("orderNumber",$this->orderNumber)
            ->insert("imagexalbum");
            //$Insert=mysqli_query($enlace,"INSERT INTO Person (idPerson,Name) values(".$Cedula." , '".$Nombre."');");
  }

  function ImagenesAlbum($id){
      $query=$this->db->select('image.*, image.comments as coments')
                      ->from('imagexalbum')
                      ->where("idAlbum",$id)
                      ->join('image', 'image.id = imagexalbum.idImage')
                      ->order_by('imagexalbum.orderNumber', 'ASC')
                      ->get();
      return $query->custom_result_object("ImageModel");
              //$Insert=mysqli_query($enlace,"INSERT INTO Person (idPerson,Name) values(".$Cedula." , '".$Nombre."');");
    }


}
?>
