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



if($_POST){

include "Coche.php";

$cocheanadir=new Coche();
$cocheanadir1=$cocheanadir->anadirAnuncioCoche();


} else{
?>
<br>
<p id="titulo_anun">
	Crea un anuncio nuevo:
</p>

<form  method="post" id="formulario_coche">
<div id="coche_crear_anuncio" class="mb-3 mt-3">
<label for="titulo_coche" class="form-label" id="titulo">
	Título del anuncio: </label> 
	<input id="titulo_coche" name="titulo_coche" type="text" name="titulo_coche">



<label for="descripcion_coche" class="form-label" id="descripcion">
	Descripción del anuncio: 
	<textarea id="descripcion_coche" name="descripcion_coche" placeholder="Escribe una breve descripción..."></textarea> 

</label> </br>

<label for="marca_coche" class="form-label" id="marca">
	Marca del coche: 
	<input type="text" name="marca_coche" id="marca_coche" placeholder="opel..">

</label> </br>

<label for="anio_coche" class="form-label" id="anio">
	Año del vehículo: 
	<input type="number" name="anio_coche" id="anio_coche">

</label> </br>
<label for="motor_coche" class="form-label" id="motor">
	Motor del vehículo (en CV): 
	<input type="number" name="motor_coche" id="motor_coche">

</label> </br>
<label for="km_coche" class="form-label" id="km">
	Kilómetros: 
	<input type="number" name="km_coche" id="km_coche">

</label> </br>
<label for="precio_coche" class="form-label" id="precio">
	Precio: 
	<input type="number" name="precio_coche" id="precio_coche">

</label> </br>

<label for="tipo_coche" class="form-label" id="tipo">
	Tipo de vehículo: </br>
	
<input type="text" name="tipo_coche" id="tipo_coche" placeholder="berlina, ranchera, turismo....">


</label> 
<br>
<label for="imagen_coche" class="form-label" id="imagen">
	Imagen del anuncio: 
	<input type="file" name="imagen_coche" id="imagen_coche" accept=".jpg, .png, .jpeg">

</label> </br>

<label for="autor_coche" class="form-label" id="autor"> 
	Tu email: 
<input type="text" name="autor_coche" id="autor_coche" value=<?php 

include 'Usuario.php';
$usu2=new Usuario();
$usu2->autor_anuncio(); ?>

</label>

<!--Esto solo lo he añadido a modo de referencia para saber que me selecciona bien al vendedor, sin embargo, a la hora de motrarlo por pantalla lo oculto -->
<label for="id_autor_coche">
<input type="text" name="id_autor_coche" id="id_autor_coche" value="<?php 

include "Usuario.php";

$usu1=new Usuario();
$usu1->id_autor_anuncio(); ?>" >


</label>

<br>

<label for="enviar_coche"> 
	<input type="submit" name="enviar_coche" value="Crear" id="botoncrear"> </label>


</div>
</form>


<?php  }



?>




<script src="javascript.js"></script>
</body>

</html>



