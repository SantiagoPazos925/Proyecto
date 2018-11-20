<?php

require_once("db.php");

class Validador {
	function validarLogin($informacion, BaseDeDatos $db) {
		$errores = [];
		
		foreach ($informacion as $clave => $valor) {
			$informacion[$clave] = trim($valor);//por prolijidad
		}

		if ($informacion["nick"] == "") {
			$errores["usuario"] = "El campo usuario esta vacio.";
			return $errores;
		}
		if ($db->traerPorNick($informacion["nick"])==null) {
			$errores["usuario"] = "El usuario no se encuentra en nuestra base de datos";
			return $errores;
		}
		$usuario = $db->traerPorNick($informacion["nick"]);



		if ($informacion["password"] == "") {
			$errores["password"] = "No llenaste la contraseña";
			return $errores;
		}
		if (password_verify($informacion["password"], $usuario->getPassword()) == false) {
			$errores["password"] = "La contraseña no verifica";
			return $errores;
			}
		return 0; //sin errores
		}
  }

  function validarRegistro($post, BaseDeDatos $db, $files){
    $errores= [];
    $ext = '';

      $query2 = $db->traerPorNick($post['nick']);


      if(empty($post)){

        $errores['Datos'] = 'ingrese datos';
      }
      if(empty($post['nick'])){

        $errores['Usuario'] = 'ingrese usuario';
      }
      if(empty($post['nombreCompleto'])){

        $errores['Nombre'] = 'Ingrese un nombre';
      }
			if(strlen($post['nombreCompleto']) < 5){

        $errores['Nombre'] = 'Nombre demasiado corto';
      }
      if((strlen($post['nick']) < 4)){

        $errores['Nombre'] = 'nombre demasiado corto';
      }
      if(empty($post['email'])){

        $errores['Email'] = 'ingrese email';
      }
      if(!filter_var($post['email'], FILTER_VALIDATE_EMAIL)){

          $errores['Email'] = 'Email invalido';
      }
      if(empty($post['password'])){

        $errores['Password'] = 'Ingrese contraseña';
      }
      if(!($post['password'] == $post['password1'])){

        $errores['Password1'] = 'Las contraseñas deben ser iguales';
      }
      if(empty($post['plataforma'])){

        $errores['Plataforma'] = 'Seleccione una plataforma de la lista';
      }
      if(empty($post['pais'])){

        $errores['Pais'] = 'seleccione un pais de la lista';
      }
      if(empty($files['avatar']))
        $errores['Avatar'] = 'Suba una foto';
      else
        $ext = pathinfo($files['avatar']['name'], PATHINFO_EXTENSION);
     if(!( $ext == 'jpg' ||  $ext == 'png' || $ext == 'jpeg' )){

            $errores['Avatar'] = 'formato invalido';
      }
     if($query2){

       $errores['Usuario'] = 'el usuario ya existe';
     }

		if( $files['avatar']['error'] === 0 )
    {
      move_uploaded_file($files['avatar']['tmp_name'], 'avatars/'.$post['nick'].'.'.$ext);
    }

     return $errores;
	 }
