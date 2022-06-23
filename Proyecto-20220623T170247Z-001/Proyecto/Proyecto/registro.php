<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Recacoche</title>
<!-- Código CDN para Bootsrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<!--Código para insertar CSS -->
<link rel="stylesheet" type="text/css" href="estilo.css">


<!--Cógigo para insertar JQuery -->

 <script src="jquery-3.6.0.min.js"></script>

<style type="text/css">
	body{
background-image:url("imagenes/logo.png");

	}
</style>


</head>
<body>

<?php
include "basededatos.php";
error_reporting(0);
$BD=crearConexion("proyecto");
barra();


//si el usuario pulsa en registrarse, aparecerá el siguiente formulario

if($_REQUEST['idregis']) { ?>
<br>
<form method="post" id="formulario_acceso">
	<div id="enviar_R">
	<br> <br>
	<label for="usuarios" class="form-label" id="letra_R">Elige el tipo de usuario:</label>
		<select name="usuarios" id="usuarios">
 		 <option value="comprador">Comprador</option>
  		<option value="vendedor">Vendedor</option>
  		<option value="ambos">Ambos</option>
		</select> <br> <br>
		
	<label class="form-label" for="nombre" id="letra_R">Nombre:</label>
	<input  type="text" id="nombre" name="nombre"> <br> <br>

	<label class="form-label" for="apellido" id="letra_R">Apellido:</label>
	<input type="text" id="apellido" name="apellido"> <br> <br>

	<label class="form-label" for="email" id="letra_R">Email:</label>
	<input type="email" id="email" name="email"> <br><br>

	<label class="form-label" for="telefono" id="letra_R">Teléfono:</label>
	<input type="tel" id="telefono" name="telefono"> <br> <br>

	<label class="form-label" for="contrasena" id="letra_R">Contraseña:</label>
	<input type="password" id="contrasena" name="contrasena"> <br> <br>
	<input type="submit" value="Registrarme" name="submit"> <br> <br>
</div> 
</form>

<?php

//llamo a la funcion para anadir usuarios, ya que estamos en el proceso de registro

if($_POST){ 


	include "Usuario.php";

$usu1=new Usuario();
$usu1->anadirUsuarios(); }


} ?>


<?php

//si el usuario ya tiene cuenta creamos este formulario 

if($_REQUEST['idlogin']) { ?>

<br>
<form method="post" id="login">
	<div id="enviar_A">
	<div class="mb-3 mt-3">
	<label for="email" class="form-label" id="letra_R">Email:</label>
	 <input type="email" class="form-control" id="email" placeholder="Introduzca su email" name="email">
  </div>
  <div class="mb-3">
    <label for="contrasena" class="form-label" id="letra_R">Contraseña:</label>
    <input type="password" class="form-control" id="contrasena" placeholder="Introduzca su contraseña" name="contrasena">
  </div>
	<input type="submit" value="Acceder" id="acceder_boton" name="submit" class="btn btn-primary" >
</div>
</form>




<?php

//llamamos a la funcion con la que coprobamos si el usuario que quiere acceder se encuentra en la base de datos

if($_POST){

include "Usuario.php";

$usu1=new Usuario();
$usu1->comprousu();
//session_start();
//$_SESSION['conectado']==true;
}

}

?>




<script src="javascript.js"></script>
</body>
</html>	


