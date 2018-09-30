<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="eliantoFont/stylesheet.css" type="text/css" charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/formStyles.css">
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <?php
    include("header.php");
    $errorDatos = '';
    $errorEmail = '';
    $errorConsola = '';
    $errorUsuario = '';
    $errorPassword = '';
    if($_POST){
      if (!empty($_POST['user'])){
        if(!empty($_POST['email'])){
          if(!empty($_POST['email'])){
            if(!empty($_POST['password'])){
              if(!empty($_POST['consola'])){
                echo 'todo ok';
              }
              else
                $errorConsola = 'ingrese consola';
            }
            else{
              echo 'entro';
              $errorPassword = 'ingrese contraseña';
            }
          }
          else
          $errorEmail = 'Email invalido';
        }
        else
          $errorEmail = 'ingrese email';
      }
      else
        $errorUsuario = 'ingrese usuario';
    }
    else
      $errorDatos = 'ingrese datos';

    ?>
    <div class="contenedorForm col-6 ">
      <div class="contenedor col-6">
        <form class="login" action="registro.php" method="post" enctype="multipart/form-data">
          <label for="">Usuario: <span class="error" ><?php echo($errorUsuario); ?></span> <br><input type="text" name="user" value=""></label>
          <br><br>
          <label for="">Email: <span class="error" ><?= ($errorEmail); ?></span><br><input type="email" name="email" value=""></label>
          <br><br>
          <label for="">Contraseña: <span class="error" ><?= ($errorPassword); ?></span><br><input type="password" name="password" value=""></label>
          <br><br>
          <select class="" name="Consola" required>
            <option value="">Seleccione Consola</option>
            <option value="ps4">PlayStation 4</option>
            <option value="xbox">Xbox One</option>
            <option value="pc">PC</option>
          </select>
          <br><br><input type="submit" name="" value="Registarme" class="btn btn-primary">
        </form>
      </div>

  </body>
</html>
