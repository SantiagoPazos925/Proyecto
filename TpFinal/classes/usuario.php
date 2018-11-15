<?php

class Usuario {

  private $id;
  private $nombreCompleto;
  private $nick;
  private $email;
  private $password;
  private $pais;
  private $plataforma;
  private $avatar;


  public function Usuario ($nombreCompleto, $nick, $email, $password, $pais, $plataforma,$avatar,$id = null){

    $this->nick = $nick;
    $this->email = $email;
    $this->password = $password;
    $this->nombreCompleto = $nombreCompleto;
    $this->pais = $pais;
    $this->plataforma = $plataforma;
    $this->setAvatar($avatar);
  }
  //111111111111111111111111111111111111
  public function setId($id){
    $this->id = $id;

  }
  public function getId(){
    return $this->id;
  }
    //111111111111111111111111111111111111
  public function setNick($nick){
    $this->nick = $nick;

  }
  public function getNick(){
    return $this->nick;
  }
    //111111111111111111111111111111111111
  public function setEmail($email){
    $this->email = $email;

  }
  public function getEmail(){
    return $this->email;
  }
    //111111111111111111111111111111111111
  public function setPassword($password){
    $this->password = $password;

  }
  public function getPassword(){
    return $this->password;

}
  //111111111111111111111111111111111111
  public function setPais($pais){
  $this->pais = $pais;

  }
  public function getPais(){
  return $this->pais;

  }
  //111111111111111111111111111111111111
  public function setPlataforma($plataforma){
  $this->plataforma = $plataforma;

  }
  public function getPlataforma(){
  return $this->plataforma;

  }
  //111111111111111111111111111111111111
  public function setNombreCompleto($nombreCompleto){
  $this->nombreCompleto = $nombreCompleto;

  }
  public function getNombreCompleto(){
  return $this->nombreCompleto;

  }
  //111111111111111111111111111111111111

  public function getAvatar(){
  return $this->avatar;

  }

  function setAvatar($files){
    $ext = pathinfo($files['avatar']['name'], PATHINFO_EXTENSION);
    $ruta = 'avatars/'.$this->getNick().'.'.$ext;
    $this->avatar = $ruta;
  }


}
