<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	

<!-- Código CDN para Bootsrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<!--Código para insertar CSS -->
<link rel="stylesheet" type="text/css" href="estilo.css">




<!--Cógigo para insertar JQuery -->
 <script src="jquery-3.6.0.min.js"></script>

<title>Recacoche</title>


</head>

<body>
	<?php
include "basededatos.php";
$BD=crearConexion("proyecto");
error_reporting(0);
/*$q="SELECT * FROM usuarios WHERE email='" . $_SESSION['email']. "'";
$consultB=mysqli_query($BD,$q);
$cons= mysqli_fetch_assoc($consultB);*/



//llamo a la función barra de la cabecera
barra();

?>
<!--una vez que el usuario pulsa en acceder, le damos la opcion de que se registre o entre en su cuenta-->
<!--<br> <h1 id="bienvenida"> Bienvenido a Recacoche </h1> <br>
<h4 id="opcion">Elija una de las dos opciones para acceder:</h4> <br>

<a type="button" href="registro.php?idregis=?" id="idregis" name="idregis" <?php //$_SESSION['estado']='idregis'; ?>> Quiero registrarme </a>

<a type="button" href="registro.php?idlogin=?" id="idlogin" name="idlogin" <?php //$_SESSION['estadodos']='idlogin'; ?>> Ya tengo cuenta </a>
-->
<br>
<!--<div class="card mx-auto">
  <div class="card-header">
    <h1 id="bienvenida"> Bienvenido a Recacoche </h1>
  </div> <br>
   <img class="card-img-top" src="imagenes/logo.png" alt="Card image">
  <div class="card-body">
    <h5 class="card-title" id="opcion">Elija una de las dos opciones para acceder:</h5> <br> <br>
    <a type="button" class="btn btn-primary" href="registro.php?idregis=?" id="idregis" name="idregis" <?php $_SESSION['estado']='idregis'; ?>> Quiero registrarme </a>
    <a type="button" href="registro.php?idlogin=?" id="idlogin" class="btn btn-primary" name="idlogin" <?php $_SESSION['estadodos']='idlogin'; ?>> Ya tengo cuenta </a>
  </div>
</div>-->
<div class="container mt-3">
  <h2 id="bienvenida"> Bienvenido a Recacoche </h2> <br>
  <div class="card img-fluid mx-auto" style="width:500px">
    <img class="card-img-top" src="imagenes/logo.png" alt="Card image" style="width:100%">
    <div class="card-img-overlay">
      <h4 class="card-title">Elija una de las dos opciones para acceder:</h4> <br>
      <p class="card-text"> <a type="button" class="btn btn-primary" href="registro.php?idregis=?" id="idregis" name="idregis" <?php $_SESSION['estado']='idregis'; ?>> Quiero registrarme </a> </p>
       <p class="card-text"> <a type="button" href="registro.php?idlogin=?" id="idlogin" class="btn btn-primary" name="idlogin" <?php $_SESSION['estadodos']='idlogin'; ?>> Ya tengo cuenta </a>  </p>
    </div>
  </div>
</div>






<script src="javascript.js"></script>
</body>
</html>