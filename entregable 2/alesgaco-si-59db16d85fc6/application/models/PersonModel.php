<?php

class PersonModel extends CI_Model {
  private $id="";
  private $name="";

  public function setData($data)
  {
    if(isset($data['id'])){$this->id=$data['id'];}
    $this->name=$data['name'];

  }

function setId($id){
$this->id=$id;
}


function getId(){
return $this->idPerson;
}

function setName($name){
$this->name=$name;
}

function getName(){
return $this->name;
}


function validate(){
  $this->form_validation->set_rules('id','La cedula','required',array('required'=>"%s es obligatorio"));
  $this->form_validation->set_rules('name', 'EL nombre','required',array('required'=>"%s es obligatorio"));

  return $this->form_validation->run();

}



function insertar(){

 $this->db->set("id",$this->id)
          ->set("name",$this->name)
          ->Insert("Person");
          //$Insert=mysqli_query($enlace,"INSERT INTO Person (idPerson,Name) values(".$Cedula." , '".$Nombre."');");
}


}

 ?>
