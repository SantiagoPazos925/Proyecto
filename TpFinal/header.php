<?php
require_once("classes/autoload.php");

$arrayUsuario = $auth->usuarioLog($bd);

 ?>
<div class="container-fluid header ">


<div class="row navBar">
  <div class="col-4  logo">
    <h2><a style="text-decoration:none" href="index.php"><span style='color:rgb(203, 51, 42);'>Digital</span><span style="color:white;">games</span></h2></a>
  </div>
  <div class="col-6  iconos">

    <i class="ion-android-cart"></i>
    <i class="ion-navicon-round"></i>
  </div>
  <div class="col-6   categorias">
      <?php
        $categoria = [
          ["cate"=>"Home","url"=>"index.php", "col"=>"  col-2"],
          ["cate"=>"Preguntas Frecuentes","url"=>"faq.php", "col"=>"col-4"],
          ["cate"=>"Registro","url"=>"registro.php", "col"=>"col-2"],
          ["cate"=>"Login","url"=>"login.php", "col"=>"col-2"],
          ["cate"=>$arrayUsuario["nick"],"url"=>"miPerfil.php", "col"=>"col-2"]

        ];
       ?>
      <ul class="row  navigation" style="text-align: center;">
        <?php foreach ($categoria as $cat){
          if (isset($arrayUsuario["nick"])){
            if ($cat["cate"] == "Registro" || $cat["cate"] == "Login") {

          }else {
              echo '<div id="navText" class="'.$cat["col"].'"><a id="navText" href="'.$cat["url"].'"><li >'.$cat["cate"].'</li></a></div>';
          }

        }elseif (isset($cat["cate"])) {
            echo '<div id="navText" class="'.$cat["col"].'"><a id="navText" href="'.$cat["url"].'"><li >'.$cat["cate"].'</li></a></div>';
        }



        }
        ?>




          <div class="col-2 col-lg-2 carrito">

          <i class="ion-android-cart"></i>

        </div>
      </ul>
  </div>
  </div>
  <div id="search" class="container">
    <div class="row buscador">
      <div  class="col-10 searching ">

        <input type="search" name="" value="" placeholder="Busca tu juego aqui">
      </div>
      <div class="col-2 iconSearch">
        <i class="ion-search"></i>
      </div>
    </div>


    </div>
  </div>
</div>
