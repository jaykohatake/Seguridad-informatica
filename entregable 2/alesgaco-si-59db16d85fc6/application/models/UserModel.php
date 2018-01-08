<?php
class UserModel extends CI_Model{

  private $id="";
  private $idPerson="";
  private $nickName="";
  private $avatar="";
  private $pass="";
  private $rol="";

  public function setData($data)
  {
		if(isset($data['id'])){$this->id=$data['id'];}
    $this->nickName=$data['nickName'];
    $this->pass=$data['pass'];
    if(isset($data['idPerson'])){$this->idPerson=$data['idPerson'];}
    if(isset($data['rol'])){$this->rol=$data['rol'];}
    if(isset($data['avatar'])){$this->avatar=$data['avatar'];}

  }

  function setId($Person_id){
  $this->id=$Person_id;
  }

  function getId(){
  return $this->id;
  }

  function setIdPerson($Person_id){
  $this->idPerson=$Person_id;
  }

  function getIdPerson(){
  return $this->idPerson;
  }

  function setNikName($nickName){
  $this->nickName=$nickName;
  }

  function getNikName(){
  return $this->nickName;
  }

  function setAvatar($avatar){
  $this->avatar=$avatar;
  }


  function getAvatar(){
  return $this->avatar;
  }

  function setPass($pass){
  $this->pass=$pass;
  }

  function getPass(){
  return $this->pass;
  }

  function setRol($pass){
  $this->rol=$pass;
  }

  function getRol(){
  return $this->rol;
  }

  public function loguear()
  {
    $query=$this->db->select('*')
    													->from('users')
    													->where("nickName",$this->nickName)
    													->get();
    					$result= $query->custom_result_object("UserModel");
    		           if(count($result)>0){
    								 $passwordHasher = new PasswordHash(8,false);
    								 $passwordMatch = $passwordHasher->CheckPassword($this->pass, $result[0]->getPass());
    		             if($passwordMatch){
    		             //aca es donde se setean los datos en las variables de sesion (piensen en setear como ponerlos a dispocicion de culquier php recuerden que php solo se ejecuta en el servidor)
    		             $this->session->set_userdata("rol",$result[0]->getRol());
    		             $this->session->set_userdata("id",$result[0]->getId());
    								 return true;
                   }return false;
                 }return false;

  }

  function validate(){
    $this->form_validation->set_rules('nickName','El apodo','required',array('required'=>"%s es obligatorio"));
    $this->form_validation->set_rules('pass', 'La contraseña','required',array('required'=>"%s es obligatorio"));
    $this->form_validation->set_rules('rol', 'EL rol','required',array('required'=>"%s es obligatorio"));
    return $this->form_validation->run();
  }

  function loginValidate(){
    $this->form_validation->set_rules('nickName','El apodo','required',array('required'=>"%s es obligatorio"));
    $this->form_validation->set_rules('pass', 'La contraseña','required',array('required'=>"%s es obligatorio"));
    return $this->form_validation->run();
  }


  function insertar(){
    $passwordHasher = new PasswordHash(8,false);
$password = $passwordHasher->HashPassword($this->pass);
  $this->db->set("idPerson",$this->idPerson)
            ->set("id",$this->id)
            ->set("nickName",$this->nickName)
            ->set("avatar",$this->avatar)
            ->set("pass",$password)
            ->set("rol",$this->rol)
            ->insert("users");
//  mkdir("../Albums/".$this->id);          //$Insert=mysqli_query($enlace,"INSERT INTO Person (idPerson,Name) values(".$Cedula." , '".$Nombre."');");
  }
}
 ?>
