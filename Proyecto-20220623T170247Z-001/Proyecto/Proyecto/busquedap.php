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

<?php
session_start();
include "basededatos.php";
$BD=crearConexion("proyecto");
error_reporting(0);
barra();
buscarP();

//$consul="SELECT * FROM coches WHERE marca LIKE '%$busqueda%'";
/*
if (isset($_POST['search'])) {
    //Recogemos las claves enviadas
    $keywords = $_POST['keywords'];

    //Conectamos con la base de datos en la que vamos a buscar

    $query = "SELECT * FROM coches WHERE marca LIKE '%$keywords%'";

    $query_searched = mysqli_query($BD, $query);

    $count_results = mysqli_num_rows($query_searched);

    //Si hay resultados
    if ($count_results > 0) {

        echo '<h2>Se han encontrado '.$count_results.' resultados.</h2>';

        echo '<ul>';
        while ($row_searched = mysqli_fetch_array($query_searched)) {
            //En este caso solo mostramos el titulo y fecha de la entrada
            echo '<li><a href="#">'.$row_searched['titulo'].' ('.$row_searched['anuncio'].')</a></li>';
        }
        echo '</ul>';
    }
    else {
        //Si no hay registros encontrados
        echo '<h2>No se encuentran resultados con los criterios de búsqueda.</h2>';
    }
}

*/


?>



<br>
<footer id="fijo">
  <p>Autor: Sara Fernandez Torralbo </p>
    <p> ¿Tienes alguna duda?
  <a href="mailto:recacoche1@gmail.com"> ¡Contacta con nosotros! </a></p>
</footer>

<script src="javascript.js"></script>
</body>

</html>