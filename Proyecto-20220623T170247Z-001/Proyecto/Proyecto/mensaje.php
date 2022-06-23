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

	<title> Enviar mensaje </title>
</head>
<body>

<?php 

	session_start();
include "basededatos.php";
$BD=crearConexion("proyecto");
barra();


$arrayDatB=mysqli_fetch_array(id_mensaje());

if(isset($_REQUEST['idmensaje'])){


?>
<br>
<form method="post">
	<div id="form_mensaje">
	  <div class="mb-3">
	<label for="destinatario"class="form-label" id="mensaje_F">
		Destinatario:
<input type="text" name="destinatario" class="form-control" id="destinatario" value="<?php echo $arrayDatB['autor']; ?>">
	</label> <br>
	<label for="asunto" class="form-label" id="mensaje_F">
		Asunto:
<input type="text" class="form-control" name="asunto" id="asunto">
	</label> <br>

	<label for="mensaje" class="form-label" id="mensaje_F">
		Mensaje:
<input type="text" class="form-control" name="mensaje" id="mensaje">
	</label> <br>

	<label for="idautor" id="ocultar_id" id="mensaje_F">
<input type="text" class="form-control" name="idautor" id="idautor" value="<?php echo $arrayDatB['fk_id_usuario']; ?>" >
	</label> 

	<label for="remitente" class="form-label" id="mensaje_F">
		Tu email:
<input type="text" name="remitente" id="remitente" class="form-control" >
	</label> <br>
<label for="enviar" >
<input type="submit" id="boton_mensaje" name="enviar" value="Enviar"> </label> <br> <br>

<?php 

if($_POST){

insertarmensaje();

recogerMensaje();


} else{





}

  ?>





</div></div>
</form>

<?php } ?>

<br>
<footer id="fijo">
  <p>Autor: Sara Fernandez Torralbo<br>
    <p> ¿Tienes alguna duda?
  <a href="mailto:recacoche1@gmail.com"> ¡Contacta con nosotros! </a></p></p>
</footer>

<script src="javascript.js"></script>
</body>
</html>

