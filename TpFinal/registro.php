<!DOCTYPE html>
<?php
$userCountry = "";
$paises=[
  "Seleccione un pais", "Afghanistan", "Albania", "Argelia", "Alemania", "American Samoa", "Andorra", "Angola", "Anguilla", "Antartida", "Antigua y Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia-Herzegovina", "Botswana", "Bouvet Island", "Brasil", "Brit Ind Ocean Territory", "Brunei Darussalm", "Bulgaria", "Burkina Faso", "Burma", "Burundi", "Cambodia", "Cameroon", "Canada", "Canary Islands", "Cape Verde", "Caymen Islands", "Central African Rep", "Chad", "Chile", "China", "Christmas Islands", "Cocos Islands", "Colombia", "Comoros", "Congo", "Cook Islands", "Costa Rica", "Croatia", "Cuba", "Chipre", "Dem Rep. of Korea", "Dinamarca", "Djibouti", "Dominica", "East Timor", "Ecuador", "Egipto", "El Salvador", "Eritrea", "España", "Estados Unidos de America", "Estonia", "Etiopia", "Faroe Islands", "Fiji", "Finland", "Francia", "Guiana Francesa", "Polynesia Francesa", "French So. Territories", "Gabon", "Gambia", "Georgia", "Ghana", "Gibraltar", "Guinea Equatorial", "Grecia", "Greenland", "Grenada", "Guadalupe", "Guatemala", "Guinea", "Guinea Bissau", "Guyana", "Haiti", "Heard, McDonald Island", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Inglaterra", "Iran", "Iraq", "Ireland", "Islas Filipinas", "Israel", "Italia", "Ivory Coast", "Jamaica", "Japon", "Jordan", "Kazakhistan", "Kenia", "Kiribati", "Korea del Norte", "Kuwait", "Kyrqyzstan", "Laos", "Lativa", "Libano", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Madagascar", "Malawi", "Malaysia", "Maldivas", "Mali", "Malta", "Malvinas Argentinas", "Mariana Islands", "Marruecos", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montserrat", "Mozambique", "Myanmar", "Nambia", "Nauru", "Nepal", "Netherland Antilles", "Netherlands", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue Island", "Norfolk Island", "Northern Mariana Island", "Norway", "OCE", "Oman", "Pacific Islands", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reino Unido", "Republica de Corea", "Republica Dominicana", "Reunion", "Romania", "Russian Federation", "Rwanda", "South Georgia Sandwich", "Saint Pierre Miguelon", "Samoa", "San Marino", "Sao Tomee and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierre Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somali Republic", "South Africa", "South Korea", "Sri Lanka", "St. Helena", "St. Kits-Nevis", "St. Lucia", "St. Vincent/Grenadines", "Sudan", "Suriname", "Svalbard Jan Mayen", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tokeelau", "Tonga", "Trinidad Tobago", "Tunisia", "Turquia", "Turkmenistan", "Turks Caicos Islands", "Tuvalu", "Uganda", "Ukrania", "United Arab Emirates", "Uruguay", "US Minor Outlying Is.", "Uzbekistan", "Vanuatu", "Vatican City State", "Venezuela", "Vietnam", "Virgin Islands: British", "Virgin Islands: US", "Wallis Futuna Islands", "Western Sahara", "Western Samoa", "Yemen", "Yugoslavia", "Zaire", "Zambia", "Zimbabwe"
]; ?>
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
    <title>Registrarme</title>
  </head>
  <body>

    <?php
    include("header.php");
    require_once("classes/autoload.php");

      if ($_POST) {
      $errores =  $validador->validarRegistro($_POST, $bd , $_FILES );
      if(count($errores)==0){
        $usuario = new Usuario( $_POST['nombreCompleto'], $_POST['nick'], $_POST['email'], $_POST['password'], $_POST['pais'], $_POST['plataforma'],$_FILES);
        $bd->guardarUsuario($usuario);

        header('location: miPerfil.php?nick='.$_POST['nick'].'');

      }
    }






?>

    <div class="registrate">
      <h2>Se parte de la comunidad <span style="color:rgb(203, 51, 42);">Digital</span>Games!</h2>
    </div>

    <div class="contenedorForm col-10 offset-1">

      <div class="contenedor-fluid">
        <form class="login" action="registro.php" method="post" enctype="multipart/form-data" >
          <span class="error"><?=$errores['Datos']??''?></span> <br>
          <label for="">Nombre Completo: <span class="error" ><?=$errores['Nombre']??''?></span> <br><input type="text" name="nombreCompleto" value="<?php echo (($_POST['nombreCompleto'])??'')?>"> </label>
          <br><br>
          <label for="">Usuario: <span class="error" ><?=$errores['Usuario']??''?></span> <br><input type="text" name="nick" value="<?php echo (($_POST['nick'])??'')?>"></label>
          <br><br>
          <label for="">Email: <span class="error" ><?=$errores['Email']??''?></span><br><input type="email" name="email" value="<?php echo (($_POST['email'])??'')?>"></label>
          <br><br>
          <span class="error" ><?=$errores['Pais']??''?></span><br>
          <div class="userData">
              <div class="labelUserData">
                <label for="userCountry"> País de nacimiento:</label>
              </div>
              <div class="inputUserData">
                <?php $userCountry; if (isset($_POST["pais"])) { $userCountry = $_POST["pais"];} ?>
                <select  name="pais">
                  <?php foreach ($paises as $pais) {
                   echo ('<option '.( ($userCountry == $pais )? 'selected':'').' value="'.$pais.'" >'.$pais.'</option>');
                 }?>
                </select>
                <span style="color:red;">*</span>
              </div>
          </div>
          <br><br>
          <label for="">Avatar: <span class="error" ><?=$errores['Avatar']??''?></span><input type="file" name="avatar" value=""></label>
          <br><br>
          <label for="">Contraseña: <span class="error" ><?=$errores['Password']??''?></span><br><input type="password" name="password" value=""></label>
          <br><br>
          <label for="">Repetir contraseña: <span class="error"><?=$errores['Password1']??''?></span><br><input type="password" name="password1" value=""></label>
          <br><br>
          <select class="" name="plataforma" value = ""><span class="error" ><?=$errores['Plataforma']??''?></span>
            <option value="">Seleccione plataforma</option>
            <option value="ps4">PlayStation 4</option>
            <option value="xbox">Xbox One</option>
            <option value="pc">PC</option>
          </select>
          <br><br><input type="submit" name="" value="Registarme" class="btn btn-primary">
        </form>

      </div>

    </div>
    <br><br>
      <?php
      include("footer.php");
       ?>

  </body>
</html>
