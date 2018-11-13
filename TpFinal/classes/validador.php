<?php

require_once("db.php");

class Validator {
	function validarLogin($informacion, DB $db) {
		$errores = [];

		foreach ($informacion as $clave => $valor) {
			$informacion[$clave] = trim($valor);//por prolijidad
		}


		if ($informacion["usuario"] == "") {
			$errores["usuario"] = "El campo usuario esta vacio.";
		}
		else if (filter_var($informacion["email"], FILTER_VALIDATE_EMAIL) == false) {
			$errores["mail"] = "El Email tiene que tener formato de Email";
		} else if ($db->traerPorUsuario($informacion["usuario"]) == NULL) {
			$errores["usuario"] = "El usuario no se encuentra en nuestra base de datos";
		}

		$usuario = $db->traerPorUsuario($informacion["usuario"]);

		if ($informacion["password"] == "") {
			$errores["password"] = "No llenaste la contraseña";
		} else if ($usuario != NULL) {
			//El usuario existe y puso contraseña
			// Tengo que validar que la contraseño que ingreso sea valida
			if (password_verify($informacion["password"], $usuario->getPassword()) == false) {
				$errores["password"] = "La contraseña no verifica";
			}
		}
  }
  function validarRegistro(){
    $error = 0;
    $errores= [];
    $ext = '';
    if($_POST){
      $query2 = $db->conex->prepare('SELECT * FROM usuarios WHERE email = :email');
      $query2->bindvalue(':email', $_POST['email']);
      $query2->execute();
      $query3 = $db->conex->prepare('SELECT * FROM usuarios WHERE nombre = :user');
      $query3->bindvalue(':user', $_POST['user']);
      $query3->execute();
      $cantUsuarios = $query3->rowcount();
      $cantEmails = $query2->rowcount();
      if(empty($_POST)){

        $error['Datos'] = 'ingrese datos';
      }
      if(empty($_POST['user'])){

        $errores['Usuario'] = 'ingrese usuario';
      }
      if(empty($_POST['name'])){

        $errores['Nombre'] = 'Ingrese un nombre';
      }
      if((strlen($_POST['name']) < 4)){

        $errores['Nombre'] = 'nombre demasiado corto';
      }
      if(empty($_POST['email'])){

        $errores['Email'] = 'ingrese email';
      }
      if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

          $error['Email'] = 'Email invalido';
      }
      if(empty($_POST['password'])){

        $errores['Password'] = 'Ingrese contraseña';
      }
      if(!($_POST['password'] == $_POST['password1'])){

        $errores['Password1'] = 'Las contraseñas deben ser iguales';
      }
      if(empty($_POST['plataforma'])){

        $errores['Plataforma'] = 'Seleccione una plataforma de la lista';
      }
      if(empty($_POST['pais'])){

        $errores['Pais'] = 'seleccione un pais de la lista';
      }
      if(empty($_FILES['avatar']))
        $error[''] = 11;
      else
        $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
     if(!( $ext == 'jpg' ||  $ext == 'png' || $ext == 'jpeg' )){

            $error['Avatar'] = 'formato invalido';
      }
     if($cantUsuarios){

       $error['Usuario'] = 'el usuario ya existe';
     }
     if($cantEmails){

       $errores['Email'] = 'el email ya existe';
     }
     return $errores;
  }
