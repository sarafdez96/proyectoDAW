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


	<title> Recacoche </title>
</head>
<body >




<?php

session_start();
include "basededatos.php";
$BD=crearConexion("proyecto");
error_reporting(0);
barra();

include "Pieza.php";

$borrar=new Pieza();
$borrar2=$borrar->idborrar();

$arrayDatB=mysqli_fetch_array($borrar2);



if(isset($_REQUEST['idborrarpieza'])){


?>
<br>
<p id="titulo_anun">
	Eliminar anuncio:
</p>

<form method="post">
<div id="elimi_C">
<!--Este id solo ha sido para comprobar que obtengo el anuncio correcto, sin embargo, a la hora de mostrar el formulario no se enseñará -->
<label for="id_borrarpieza" id="ocultar_id">
	ID del anuncio: 
	<input id="id_borrarpieza" name="id_borrarpieza" type="number" value="<?php echo $arrayDatB['id_pieza']; ?>">

</label> </br>
<label for="titulo_pieza" id="titulo_elim">
	Titulo del anuncio: 
	<input id="titulo_pieza" name="titulo_pieza" type="text" value="<?php echo $arrayDatB['titulo_anunpieza']; ?>">

</label> </br>
<br>

<label for="descripcion_pieza" id="titulo_elim">
	Descripción del anuncio: 
	<input type="textarea" id="descripcion_pieza" name="descripcion_pieza" value="<?php echo $arrayDatB['descrip_repuesto']; ?>"> 

</label> </br>

<label for="marca_pieza" id="titulo_elim">
	Marca de la pieza: 
	<input type="text" name="marca_pieza" id="marca_pieza" value="<?php echo $arrayDatB['marca_repuesto']; ?>">

</label> </br><br>

<label for="anio_pieza" id="titulo_elim">
	Año de la pieza: 
	<input type="number" name="anio_pieza" id="anio_pieza" value="<?php echo $arrayDatB['anio_repuesto']; ?>">


</label> 

<br> <br>

<button name="borrar_coche" id="boton_eliminar" value="Eliminar" onclick="eliminar()"> Eliminar </button> <br> <br>


<?php 

if($_POST){
include "Pieza.php";

$b=new Pieza();
$b3=$b->borrarPiezas();

//echo "<script> ocultar_form(); </script>";

} else{








}

  ?>
</div>
</form>







<?php
} 







?>






<footer id="fijo">
  <p>Autor: Sara Fernandez Torralbo<br>
    <p> ¿Tienes alguna duda?
  <a href="mailto:recacoche1@gmail.com"> ¡Contacta con nosotros! </a></p></p>
</footer>
<script src="javascript.js"></script>
</body>

</html>
