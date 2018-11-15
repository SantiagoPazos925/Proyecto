<?php


  class Auth{


    public function Auth(){
      session_start();

    }

    public function logear($nick){

      $_SESSION["logueado"]= $nick;

      header('location: miPerfil.php?nick='.$nick.'');
    }
    public function logout(){
      session_destroy();
      header('location:index.php');
    }
    public function logeado(){
      return isset($_SESSION["logueado"]);
    }

    public function recordarUsuario($nick){
        setcookie("logueado", $nick, time() +3600*3);
    }

    public function usuarioLog(BaseDeDatos $bd){
      if($this->logeado()){
      return $bd->traerPorNick($_SESSION["logueado"]);

      }else {
        return NULL;
      }
    }
  }







 ?>
