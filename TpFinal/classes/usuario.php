<?php

Class Usuario {
  protected $id;
  protected $nombre;
  protected $email;
  protected $contraseña;
  protected $imagen;

public function __construct($nombre,$email,$contraseña,$imagen,$id=null){
  $this->setId($id);
  $this->setNombre($nombre);
  $this->setEmail($email);
  $this->setContraseña($contraseña);
  $this->setImagen($imagen);
}


public function setId($id){
  $this->id=$id;
}

public function getId(){
  return $this->id;
}

public function setNombre($nombre){
  $this->nombre=$nombre;
}

public function getNombre(){
  return $this->nombre;
}

public function setEmail($email){
  $this->email=$email;
}

public function getEmail(){
  return $this->email;
}

public function setContraseña($contraseña){
  $this->contraseña=$contraseña;
}

public function getContraseña(){
  return $this->contraseña;
}

public function setImagen($imagen){
  $this->imagen=$imagen;
}

public function getImagen(){
  return $this->imagen;
}




}
