<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>RecaCoche</title>

<!-- Código CDN para Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<!-- código para los iconos de bootstrap-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<!--Código para insertar mi CSS -->
<link rel="stylesheet" type="text/css" href="estilo.css">



<!--Cógigo para insertar JQuery -->
 <script src="jquery-3.6.0.min.js"></script>





</head>
<body>

<?php
session_start();
include "basededatos.php";
$BD=crearConexion("proyecto");
error_reporting(0);
barra();

//Llamamos a la funcion en la que aparecen todos los datos del usuario que ha accedido por pantalla

include "Usuario.php";

$usu=new Usuario();
$usu->comprobarUsuario();


?>

<!--creamos un enlace que nos lleve a crear anuncios nuevos-->
<div id="botones_crear">
<button onclick="publicaranuncio()" id="crear_anuncio" name="crear_anuncio" value="Crear_anuncio"> Publicar un anuncio de coche </button> 

<button id="crear_anuncio_pieza" onclick="publicaranuncioP()" name="crear_anuncio_pieza" value="Crear_anuncio_pieza"> Publicar un anuncio de pieza </button>

</div> <br>
<!--<div id="imagenlogo">
	
<img src="imagenes/logo.png" alt="logo">


</div>-->

<?php 


include "Coche.php";

$perfil=new Coche();
$perfil2=$perfil->anunciosPerfil();

include "Pieza.php";
$pieza=new Pieza();
$pieza->anunciosPerfil();



?>











<!--Código de JS, lo añado al final del body para que no de problemas a la hora de insertarlo -->

<script src="javascript.js"></script>
</body>
</html>


