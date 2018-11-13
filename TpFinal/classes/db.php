<?php

Class db {
  protected $dsn = 'mysql:host=localhost;dbname=digitalgames_db;
  charset=utf8mb4;port=3306';
  protected  $user ="root";
  protected  $pass = "";
  public  $conex;
  public function __construct(){
      try{

          $this->conex = new PDO($this->dsn, $this->user, $this->pass);

      }catch( PDOException $ex ){

          echo 'El error es -> '. $ex->getMessage();
      }
    }

    public function getConex(){
      return $this->conex;
    }

    public function guardarUsuario(Usuario $usu){
      $query=$this->conex->prepare('INSERT INTO usuarios (nombre, email, contrasena,imagen)VALUES (:nombre,:email,:contrasena,:imagen)');
      $query->bindValue(':nombre', $usu->getNombre());
      $query->bindValue(':email', $usu->getEmail());
      $query->bindValue(':contrasena', $usu->getContraseña());
      $query->bindValue(':imagen', $usu->getImagen());
      $query->execute();
      $id=$this->conex->lastInsertId();
      $usu->setId($id);
    }
    public function traerPorUsuario($usu){
      $query=$this->conex->prepare('SELECT * FROM usuarios WHERE nombre = :nom');
      $query->bindValue(':nom',$usu);
      $query->execute();
      $user=$query->fetch(PDO::FETCH_ASSOC);
      return $user;
    }
}
