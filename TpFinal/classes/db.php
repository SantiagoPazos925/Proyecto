<?php



  class BaseDeDatos {

  protected $dsn = 'mysql:host=localhost;dbname=digitalgames_db;
  charset=utf8mb4;port=3306';
  protected  $user ="root";
  protected  $pass = "";

  protected  $conex;


  public function BaseDeDatos(){

  try {

    $this->conex = new PDO($this->dsn, $this->user, $this->pass);

  } catch (\Exception $ex) {
      echo 'El error es -> '. $ex->getMessage();
  }
  }


  public function guardarUsuario(Usuario $usuario){


    $query = $this->conex->prepare("INSERT INTO usuarios ( nombreCompleto, nick, email, password, pais, plataforma, avatar) VALUES ( :nombreCompleto, :nick, :email, :password, :pais, :plataforma, :avatar)");

    $query->bindValue(":nick", $usuario->getNick());
    $query->bindValue(":email", $usuario->getEmail());
    $query->bindValue(":password", $usuario->getPassword());
    $query->bindValue(":nombreCompleto", $usuario->getNombreCompleto());
    $query->bindValue(":pais", $usuario->getPais());
    $query->bindValue(":plataforma", $usuario->getPlataforma());
    $query->bindValue(":avatar", $usuario->getAvatar());

    $query->execute();
    $id = $this->conex->lastInsertId();

    $usuario->setId($id);



  }
  public function traerPorNick($usuario){



    $query = $this->conex->prepare("SELECT * FROM usuarios WHERE nick = :nick ");

    $query->bindValue(":nick", $usuario);
    $query->execute();

    $elUsuario = $query->fetch(PDO::FETCH_ASSOC);

    return $elUsuario;




  }
  // public function editarUsuario($usuario){
  //   $this->traerPorNick($usuario);
  //   $query = $this->conex->prepare("UPDATE `usuarios` SET `nombreCompleto` = :nombreCompleto =, `nick` = :nick , `email` = :email , `pais` = :pais , `plataforma` = :plataforma ");
  //
  //   $query->bindValue(":nick", $usuario->getNick());
  //   $query->bindValue(":email", $usuario->getEmail());
  //   $query->bindValue(":password", $usuario->getPassword());
  //   $query->bindValue(":nombreCompleto", $usuario->getNombreCompleto());
  //   $query->bindValue(":pais", $usuario->getPais());
  //   $query->bindValue(":plataforma", $usuario->getPlataforma());
  //   $query->bindValue(":avatar", $usuario->getAvatar());
  //
  //
  //
  // }




  }
