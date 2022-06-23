<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Enviar mensaje </title>
</head>
<body>

<? php

session_start();
include "basededatos.php";
$BD=crearConexion("proyecto");



$arrayDatB=mysqli_fetch_array(id_mensajePiezas());

if(isset($_REQUEST['idmensaje'])){

?>

<form method="post">
	<label for="destinatario">
		Destinatario:
<input type="text" name="destinatario" id="destinatario" value="<?php echo $arrayDatB['autor']; ?>">
	</label> <br>
	<label for="asunto">
		Asunto:
<input type="text" name="asunto" id="asunto">
	</label> <br>

	<label for="mensaje">
		Mensaje:
<input type="text" name="mensaje" id="mensaje">
	</label> <br>

	<label for="idautor">
		ID del autor:
<input type="text" name="idautor" id="idautor" value="<?php echo $arrayDatB['fk_id_autor']; ?>" >
	</label> <br>


<input type="submit" name="enviar" value="Enviar"> 

<?php 

if($_POST){

insertarmensaje();

recogerMensaje();


} else{





}

  ?>






</form>

<?php } ?>


</body>
</html>

