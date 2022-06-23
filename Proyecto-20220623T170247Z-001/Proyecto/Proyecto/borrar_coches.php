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
include "Coche.php";

$borrar=new Coche();
$borrar2=$borrar->idborrar();

$arrayDatB=mysqli_fetch_array($borrar2);



if(isset($_REQUEST['idborrarcoche'])){


?>
<br>
<p id="titulo_anun">
	Eliminar anuncio:
</p>

<form method="post" >
<div id="elimi_C">

<!--el id está a modeo de prueba para mi, pero no aparece a la hora del formulario, ya que el usuario no debe de ver los ID de la página -->

<label for="id_borrarcoche" id="ocultar_id"> 	ID del anuncio: 
</label> 
	<input id="id_borrarcoche" name="id_borrarcoche" type="number" value="<?php echo $arrayDatB['id_coche']; ?>">



<label for="titulo_coche" id="titulo_elim">
	Titulo del anuncio: </label> 
	<input id="titulo_coche" name="titulo_coche" type="text" value="<?php echo $arrayDatB['titulo_anuncoche']; ?>">

<br>
<br>

<label for="descripcion_coche" id="titulo_elim">
	Descripción del anuncio: </label> 
	<input type="text" id="descripcion_coche" name="descripcion_coche" value="<?php echo $arrayDatB['anuncio']; ?>">

<br>

<label for="marca_coche" id="titulo_elim">
	Marca del coche: </label>
	<input type="text" name="marca_coche" id="marca_coche" value="<?php echo $arrayDatB['marca']; ?>">

<br> <br>

<label for="anio_coche" id="titulo_elim">
	Año del vehículo: </label> 
	<input type="number" name="anio_coche" id="anio_coche" value="<?php echo $arrayDatB['anio']; ?>">

<br> <br>
<label for="motor_coche" id="titulo_elim">
	Motor del vehículo (en CV): </label> 
	<input type="number" name="motor_coche" id="motor_coche" value="<?php echo $arrayDatB['motor']; ?>">

<br> <br>

<label for="tipo_coche" id="titulo_elim">
	Tipo de vehículo: </label> 
	
<input type="text" name="tipo_coche" id="tipo_coche" value="<?php echo $arrayDatB['marca']; ?>" >

<br>
<br>


	<!--<input type="submit" name="borrar_coche" value="Eliminar"> -->
<label for="borrar_coche"> 
	<input type="submit" name="borrar_coche" value="Eliminar" onclick="eliminar()" id="boton_eliminar">  </label> <br> <br>

<?php 

if($_POST){
include "Coche.php";

$b=new Coche();
$b3=$b->borrarCoches();


} else{








}

  ?>
</div>
</form>







<?php
} 

?>


<br>
<footer id="fijo">
  <p>Autor: Sara Fernandez Torralbo<br>
    <p> ¿Tienes alguna duda?
  <a href="mailto:recacoche1@gmail.com"> ¡Contacta con nosotros! </a></p></p>
</footer>

<script src="javascript.js"></script>
</body>

</html>




