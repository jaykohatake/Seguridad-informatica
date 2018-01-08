<?php

 class ImageModel extends CI_Model{
  private $id="";
  private $tittle="";
  private $description="";
  private $photo="";
  private $coments="";
function __construct(){

}

public function setData($data)
{
  if(isset($data['id'])){$this->id=$data['id'];}
  $this->tittle=$data['tittle'];
  $this->photo=$data['photo'];
  if(isset($data['description'])){$this->description=$data['description'];}
  if(isset($data['coments'])){$this->coments=$data['coments'];}

}

function setComments($Person_id){
$this->coments=$Person_id;
}

function getComments(){
return $this->coments;
}


function setId($Person_id){
$this->id=$Person_id;
}

function getId(){
return $this->id;
}

function setTittle($tittle){
$this->tittle=$tittle;
}

function getTittle(){
return $this->tittle;
}

function setPhoto($nickName){
$this->photo=$nickName;
}

function getPhoto(){
return $this->photo;
}

function setDescription($avatar){
$this->description=$avatar;
}


function getDescription(){
return $this->description;
}

function validate(){
    $this->form_validation->set_rules('tittle','El titulo','required',array('required'=>"%s es obligatorio"));
//    $this->form_validation->set_rules('photo','La foto','required',array('required'=>"%s es obligatoria"));

//    $this->form_validation->set_rules('description', 'la','required',array('required'=>"%s es obligatorio"));
    return $this->form_validation->run();

  }

  function insertar(){
    $this->db->set("tittle",$this->tittle)
              ->set("photo",$this->photo)
              ->set("description",$this->description)
              ->set("comments",$this->coments)
              ->insert("image");
              //$Insert=mysqli_query($enlace,"INSERT INTO Person (idPerson,Name) values(".$Cedula." , '".$Nombre."');");
    }

    function getall(){
      $query=$this->db->select('*, comments as coments')
                      ->from('image')
                      ->get();
      return $query->custom_result_object("ImageModel");
    }

}

 ?>
