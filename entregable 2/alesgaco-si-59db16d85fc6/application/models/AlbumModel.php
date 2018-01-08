<?php
 class AlbumModel extends CI_Model{
  private $id="";
  private $name="";
  private $userid="";
  private $description="";

  public function setData($data)
  {
		if(isset($data['id'])){$this->id=$data['id'];}
    $this->name=$data['name'];
    $this->userid=$data['userid'];
    if(isset($data['description'])){$this->description=$data['description'];}

  }

  function setId($Person_id){
  $this->id=$Person_id;
  }

  function getId(){
  return $this->id;
  }

  function setIdUser($userid){
  $this->userid=$userid;
  }

  function getIdUser(){
  return $this->userid;
  }

  function setName($nickName){
  $this->name=$nickName;
  }

  function getName(){
  return $this->name;
  }

  function setDescription($avatar){
  $this->description=$avatar;
  }


  function getDescription(){
  return $this->description;
  }


function validate(){
    $this->form_validation->set_rules('name','El nombre','required',array('required'=>"%s es obligatorio"));
//    $this->form_validation->set_rules('description', 'la','required',array('required'=>"%s es obligatorio"));
    return $this->form_validation->run();
  }

function insertar(){
  $this->db->set("name",$this->name)
            ->set("idUsers",$this->userid)
            ->set("meta",$this->description)
            ->insert("album");
            //$Insert=mysqli_query($enlace,"INSERT INTO Person (idPerson,Name) values(".$Cedula." , '".$Nombre."');");
  }

function getUsersAlbum($id){
  $query=$this->db->select('*, idUsers as userid')
                  ->from('album')
                  ->where("idUsers",$id)
                  ->get();
  return $query->custom_result_object("AlbumModel");
}

}
?>
