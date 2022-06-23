<?php

session_start();
error_reporting(0);
include "basededatos.php";
$BD=crearConexion("proyecto");
include "Usuario.php";
$b1=new Usuario();
$b2=$b1->expirarsesion();

header("refresh:2;url=index.php");

	?>


	<p> Redirigiendo a la página de inicio....</p>
	<!--<a href="index.php">Volver a la página principal </a>-->