<?php require_once("classes/autoload.php"); ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="eliantoFont/stylesheet.css" type="text/css" charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/formStyles.css">
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <?php
  include("header.php");
  require_once("classes/autoload.php");
  $errorDatos = '';
  $errorUsuario = '';
  $errorPassword = '';
if($_POST){
  $errores = $validador->validarLogin($_POST, $bd);
  if(count($errores) == 0)
    $auth->logear($_POST["nick"]);

  }

  ?>
  <div class="registrate">
    <h2>Inicia sesion en <span style="color:rgb(203, 51, 42);">Digital</span>Games</h2>
  </div>

  <div class="contenedorForm col-10 offset-1">

    <div class="contenedor ">
      <form class="login" action="login.php" method="post" enctype="multipart/form-data" >
        <span class="error"><?php echo($errorDatos); ?></span> <br>
        <label for="">Usuario: <span class="error"><?= $errores['usuario']??''?></span> <br><input type="text" name="nick" value=""></label>
        <br><br>
        <label for="">Contraseña: <span class="error" ><?= $errores['password']??''?></span><br><input type="password" name="password" value=""></label>
        <br><br><input type="submit" name="" value="Ingresar" class="btn btn-primary">
      </form>

    </div>

</body>
</html>
