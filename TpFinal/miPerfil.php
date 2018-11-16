<?php
require_once("classes/autoload.php");

$arrayUsuario = $auth->usuarioLog($bd);

 ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="eliantoFont/stylesheet.css" type="text/css" charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/perfil.css">
    <title>Digital Games MiPerfil</title>
  </head>
  <body>
    <?php

    include('header.php');
    if (!$_SESSION) {
      header("location:index.php");
    }



     ?>

    <div class="container-fluid perfilInfo">
      <div class="col-12 textoBienvenida tituloEstreno" >
          <h2>Bienvenido <span style="color:rgb(203, 51, 42);"><?php echo $arrayUsuario["nick"] ?></span></h2>
      </div>
      <div class="row  ">

            <div class=" col-6 contenedorImagenPerfil">
              <div class="col-12">
                <img src=" <?php echo $arrayUsuario['avatar'] ?>" class="img-fluid avatar" alt="Responsive image" class="text-center" id="avatar">
              </div>
                <div class="col-12 imagenApodo">
                  <?php echo $arrayUsuario["nick"] ?> <br><br><button type="button" name="button"><a href="cierreSesion.php?nick=true">Desconectarse</a></button>
                </div>

            </div>
            <div class="col-6 ">
                  <form class="" action="miPerfil.php" method="post">
                    <div class="row col-12  infoUsuario">
                      <div class="col-12 info">
                        <span ><h3 >Nombre Completo:</h3> <?php  echo $arrayUsuario["nombreCompleto"]; ?>
                          <?php

                         // if(!$_POST || isset($_POST["editarNombreCompleto"])){
                         //   echo $arrayUsuario["nombreCompleto"];
                         // }
                         //   else {
                         //     echo '<input type="text" name="nombreCompleto" value="" placeholder = "'.$arrayUsuario["nombreCompleto"].'">';
                         //   }
                         //   var_dump($_POST["nombreCompleto"]);

                         ?>
                       </span>
                      </div>
                      <div class="col-12 info">
                        <span ><h3 >Apodo: </h3> <?php echo $arrayUsuario["nick"] ?>></span><br>
                      </div>
                      <div class="col-12 info">
                        <span ><h3 >Email: </h3> <?php echo $arrayUsuario["email"] ?>></span><br>
                      </div>
                      <div class="col-12 info">
                        <span ><h3 >Plataforma: </h3> <?php echo $arrayUsuario["plataforma"] ?>"></span><br>
                      </div>
                      <div class="col-12 info">
                        <span ><h3 >Pais: </h3> <?php echo $arrayUsuario["pais"] ?>></span><br>
                      </div>
                      <?php

                     // if(!$_POST || isset($_POST["editarNombreCompleto"])){
                     //   echo '<button type="submit" name="NombreCompleto" style="margin-left:10px;">Editar</button><br>';
                     // }
                     //   else {
                     //     echo '<button type="submit" name="" style="margin-left:10px;">Guardar</button><br>';
                     //   }


                     ?>

                    </div>
                  </form>




            </div>

      </div>

    </div>













    <?php include('footer.php');?>



    <script type="text/javascript" src ="js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
  </body>
</html>
