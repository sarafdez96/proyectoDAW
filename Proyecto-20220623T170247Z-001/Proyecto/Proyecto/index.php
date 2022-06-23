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


<!-- código para los iconos de bootstrap-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<!--Código para insertar CSS -->
<link rel="stylesheet" type="text/css" href="estilo.css">



<!--Cógigo para insertar JQuery -->
 <script src="jquery-3.6.0.min.js"></script>


<style type="text/css">
  
body{

/*background-color:lightskyblue;*/

}

</style>


   

	<title> Recacoche </title>
</head>
<body >
	
<?php
session_start();
include "basededatos.php";
$BD=crearConexion("proyecto");
error_reporting(0);
barra();
?>

<span class="subir"><i class="bi bi-arrow-up-square"></i></span>

<div id="cabecera">
<div id="reloj" class="reloj">00 : 00 : 00
</div>

<br>
<div id="busquedaC">
<form method="POST" action="busqueda.php" id="busqueda"> 
<input type="text" id="keywords" name="keywords" size="30" maxlength="30" placeholder="Buscar por marca">
<input type="submit" name="search" id="search" value="Buscar">
</form>
</div>

<div class="categoriasCP">
<button onclick="cochesinicio()" id="acceso_coches"   name="mostrarcoches" value="Coches"> Ver coches </button>
<button onclick="piezasinicio()" id="acceso_piezas"  name="mostrarpiezas" value="Piezas"> Ver piezas </button>
</div> 
</div>
<br> <br>


<?php

//incluyo la función para que se muestren los anuncios de los coches de forma predefinida

include "Coche.php";

$b1=new Coche();
$b2=$b1->mostraranuncio();







?>






<br>
<footer>
  <p>Autor: Sara Fernandez Torralbo </p>
    <p> ¿Tienes alguna duda?
  <a href="mailto:recacoche1@gmail.com"> ¡Contacta con nosotros! </a></p>
</footer>

<script src="javascript.js"></script>
</body>

</html>