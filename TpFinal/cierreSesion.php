<?php

  require_once("classes/autoload.php");

  if (isset($_GET["nick"])) {
    $auth->logout();

  }else {
    header("location:index.php");
  }


 ?>
