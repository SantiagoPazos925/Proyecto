<?php

$dsn = 'mysql:host=localhost;dbname=digitalgames_db';
$user = 'root';
$pass = '';

try{

    $conex = new PDO($dsn, $user, $pass);

}catch( PDOException $ex ){
    // echo 'Error con la BD, contacta con el administrador del sistema';
    echo 'El error es:'. $ex->getMessage();
}
