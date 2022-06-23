<?php


//Creo una función para conectarme a la base de datos:

	function crearConexion($database) {
		$host = "localhost";
		$user = "root";
		$password = "";
		$conexion = mysqli_connect($host, $user, $password, $database);
		return $conexion;
	}



class Usuario{

		public $usuar;
		public $nombr;
		public $apelli;
		public $emai;
		public $telef;
		public $contrasen;
		public $conexion;

        public function __constructor($conexion){
            $this->conexion=$conexion;
        }


//Creo una funcion para crear cuentas de usuarios usuarios y que se almacenen en la base de datos

public function anadirUsuarios(){
$BD=crearConexion("proyecto");

$usuar=$_POST['usuarios'];
$nombr=$_POST['nombre'];
$apelli=$_POST['apellido'];
$emai=$_POST['email'];
$telef=$_POST['telefono'];
$contrasen=$_POST['contrasena'];

$q="INSERT INTO usuarios (tipo_usuario,nombre,apellido,email,telefono,contrasena) VALUES ('$usuar','$nombr','$apelli','$emai','$telef','$contrasen')";
$qu=mysqli_query($BD,$q);

if($qu==true){
/*echo "<p class='mensaje_bienvenida'>" . " Bienvenido/a ". $nombr. ".". "Cuenta creada correctamente" . ".". "Redirigiendo a página principal" . "</p>";

header("refresh:4;url=index.php");*/

header("Location:bienvenida.php");

}

}

//creamos una funcion para que se compruebe si el usuario que quiere acceder se encuentra en la BBDD

public function comprousu(){

$BD=crearConexion("proyecto");	


//Aquí meto todo en una condicional (if($_POST)) para que lo haga todo si el usuario envía el formulario

if($_POST){
//Recojo los datos que inserta el usuario en dos variables
$contr=$_POST['contrasena'];
$correo=$_POST['email'];
	
//Hago una consulta para obtener todos los campos del usuario que ha entrado
$consul="SELECT * FROM usuarios WHERE email='" . $correo . "' AND contrasena='" . $contr . "'";

$q=mysqli_query($BD,$consul);

//Con mysqli_num_rows averiguo el número de registros que se encontraron
if( mysqli_num_rows($q) == 0){

	?>

	<h3 class="mensaje_bienvenida"> Error: No hay ningún usuario con esos datos, redirigiendo a la página principal....</h3> 
	<?php 
header("refresh:4;url=index.php");

} else {


?>
	
	<h3 class="mensaje_bienvenida"> Bienvenido a RecaCoche, redirigiendo a la página principal....</h3>


	<?php 

	header("refresh:3;url=index.php");
            

session_start();
 $_SESSION['email']=$correo;
 $_SESSION['conectado']==true;

}

}


}


//creo una funcion para mostrar en el anuncio quién es el usuario que está creando el anuncio, esto nos sirve para la identificacion de cada uno de los anuncios

public function autor_anuncio()
{

$BD=crearConexion("proyecto");
$consulta="SELECT email FROM usuarios WHERE email= '" . $_SESSION['email']. "' ";
$qu=mysqli_query($BD,$consulta);
while ($cons= mysqli_fetch_assoc($qu)) {

			
		 echo $cons ["email"]; ?>   <br>
			
<?php }  }


//creo una funcion para mostrar en el anuncio cuál es el ID del usuario que está creando el anuncio, esto nos sirve para darle un número a cada cliente que puede servir como código de fidelización del mismo

public function id_autor_anuncio()
{

$BD=crearConexion("proyecto");
$consulta="SELECT id_usuarios FROM usuarios WHERE email= '" . $_SESSION['email']. "' ";
$qu=mysqli_query($BD,$consulta);
while ($cons= mysqli_fetch_assoc($qu)) {

			
		 echo $cons ["id_usuarios"]; ?>   <br>
			
 <?php }  }



//Creo una funcion para que en la pagina de perfil de cada usuario aparezcan sus datos
public function comprobarUsuario() {
$BD=crearConexion("proyecto");

$consulta="SELECT * FROM usuarios WHERE email= '" . $_SESSION['email']. "' ";
$consulta1="SELECT apellido FROM usuarios WHERE email= '" . $_SESSION['email']. "' ";
$consulta2="SELECT email FROM usuarios WHERE email= '" . $_SESSION['email']. "' ";
$consulta3="SELECT telefono FROM usuarios WHERE email= '" . $_SESSION['email']. "' ";

$qu=mysqli_query($BD,$consulta);


while ($cons= mysqli_fetch_assoc($qu)) { ?>


			<br>	
			<div class="container mt-3" id="estilo_perfil">
				<h2 id="miperfil">Mi perfil: </h2>
			<table class="table" >
			
			<!--<td id="datos"> Mi perfil: </td> <br> -->
			<tr id="nombre" class="mdatos"> <?php echo "<b>" . "Nombre: " . "</b> " . $cons ["nombre"]; ?>  </tr> <br>
			<tr id="apellido" class="mdatos"> <?php echo "<b>" .  "Apellido: " . "</b> " . $cons ["apellido"]; ?>  </tr> <br>
			<tr id="email" class="mdatos"> <?php echo "<b>" .  "Correo electrónico: " . "</b> " . $cons ["email"]; ?>  </tr> <br>
			<tr id="telefono" class="mdatos"> <?php echo "<b>" . "Teléfono: "  . "</b> " . $cons ["telefono"]; ?>  </tr> <br>
	
	</table> </div> <br>



<?php } }  
 


public function expirarsesion(){
session_destroy();

}


}



class Coche{

public $motor;
public $marca;
public $anio;
public $tipo;
public $aut;
public $conexion;

        public function __constructor($conexion){
            $this->conexion=$conexion;
        }




//creo una funcion para insertar los datos del anuncio en la BBDD

public function anadirAnuncioCoche(){
$BD=crearConexion("proyecto");
error_reporting(0);

$motor=$_POST['motor_coche'];
$descrip=$_POST['descripcion_coche'];
$marca=$_POST['marca_coche'];
$anio=$_POST['anio_coche'];
$tipo=$_POST['tipo_coche'];
$titulo=$_POST['titulo_coche'];
$aut=$_POST['autor_coche'];
$autor=$_POST['id_autor_coche'];
$imagen=$_POST['imagen_coche'];
$precio=$_POST['precio_coche'];
$km=$_POST['km_coche'];

$q="INSERT INTO coches (marca,tipo,anio,motor,anuncio,titulo_anuncoche,autor,fk_id_usuario, imagen,precio,km) VALUES ('$marca','$tipo','$anio','$motor','$descrip','$titulo','$aut','$autor', '$imagen','$precio','$km')";

$qu=mysqli_query($BD,$q);


if($qu==true){
?>
<br>
<p id="anunciopubli">Anuncio publicado correctamente. Redirigiendo a tu cuenta.... </p>

<?php 
header("refresh:4;url=cuenta.php");

}
}


//creo una funcion para que se muestren los anuncios de los coches en la pagina principal y además hago la paginación
public function mostraranuncio(){
$BD=crearConexion("proyecto");

$q="SELECT * FROM coches ORDER BY id_coche DESC";

$qu=mysqli_query($BD,$q);

$numElementos = 10;
 
// Recogemos el parametro pag, en caso de que no exista, lo seteamos a 1
if (isset($_GET['pag'])) {
    $pagina = $_GET['pag'];
} else {
    $pagina = 1;
}
 
// (($pagina - 1) * $numElementos) me indica desde donde debemos empezar a mostrar registros
$sql = "SELECT * FROM coches LIMIT " . (($pagina - 1) * $numElementos)  . "," . $numElementos;
 
// Ejecutamos la consulta
$resultado = mysqli_query($BD, $sql);
 
// Contamos el número total de registros
$sql = "SELECT count(*) as num_personas FROM coches";
 
// Ejecutamos la consulta
$resultadoMaximo = mysqli_query($BD, $sql);
 
// Recojo el numero de registros de forma rápida
$maximoElementos = mysqli_fetch_assoc($resultadoMaximo)['num_personas'];

/*$q2="SELECT * FROM usuarios WHERE email='" . $_SESSION['email']. "'";
$consultB=mysqli_query($BD,$q2);*/

$q="SELECT * FROM usuarios WHERE email='" . $_SESSION['email']. "'";
$consultB=mysqli_query($BD,$q);
$cons= mysqli_fetch_assoc($consultB);
?>


<?php 
while($fila=mysqli_fetch_array(/*$qu*/$resultado)){
if(isset($_SESSION['email'])){


if($cons['tipo_usuario']=="comprador"){


?>

<div class="card-group">

<div class='card text-white bg-secondary mb-3' style="max-width: 18rem;">

<img class="card-img-top" src="imagenes/<?php echo $fila['imagen'];?>" width="300" height="200" alt="imagen_coche"> 
<div class="card-body">
	<h5 class="card-title" id="titulocar"> <?php echo $fila["titulo_anuncoche"]; ?></h5>
    <p class="card-text">Marca: <?php echo $fila["marca"];?></p>
    <p class="card-text">CV: <?php echo $fila["motor"];?>  </p>
    
    <p class="card-text">Kilómetros: <?php echo $fila["km"];?>   </p>



  <?php 

echo " <a type='button' class='card-link' href='mensaje.php?idmensaje=$fila[autor]' name='enviar_mensaje' id='enviar_mensaje' value='enviar_mensaje'$_SESSION[id_mensaje]='id_mensaje'; > <i class='bi bi-envelope'> <b> Enviar mensaje </b> </i> </a>";
echo "<br>";

echo " <a type='button' class='card-link' href='ventanaanuncios.php?idventana=$fila[id_coche]' name='ventana_modal' id='ventana_modal' value='ventana_modal'$_SESSION[id_coche]='id_coche'; > <b> Ver más </b> </i> </a>";

?>

</div>
</div>
</div>



           
              
        
         
          <?php








}


if($cons['tipo_usuario']=="vendedor"){


?>

<div class="card-group">

<div class='card text-white bg-secondary mb-3' style="max-width: 18rem;">

<img class="card-img-top" src="imagenes/<?php echo $fila['imagen'];?>" width="300" height="200" alt="imagen_coche"> 
<div class="card-body">
	<h5 class="card-title" id="titulocar"> <?php echo $fila["titulo_anuncoche"]; ?></h5>
    <p class="card-text">Marca: <?php echo $fila["marca"];?></p>
    <p class="card-text">CV: <?php echo $fila["motor"];?>  </p>
    
    <p class="card-text">Kilómetros: <?php echo $fila["km"];?>   </p>
   
    <?php 
echo " <a type='button' class='card-link' href='ventanaanuncios.php?idventana=$fila[id_coche]' name='ventana_modal' id='ventana_modal' value='ventana_modal'$_SESSION[id_coche]='id_coche'; > <b> Ver más </b> </i> </a>"; ?>

</div>
</div>
</div>



         
          <?php




}


if($cons['tipo_usuario']=="ambos"){


?>

<div class="card-group">

<div class='card text-white bg-secondary mb-3' style="max-width: 18rem;">

<img class="card-img-top" src="imagenes/<?php echo $fila['imagen'];?>" width="300" height="200" alt="imagen_coche"> 
<div class="card-body">
	<h5 class="card-title" id="titulocar"> <?php echo $fila["titulo_anuncoche"]; ?></h5>
    <p class="card-text">Marca: <?php echo $fila["marca"];?></p>
    <p class="card-text">CV: <?php echo $fila["motor"];?>  </p>
    <p class="card-text">Kilómetros: <?php echo $fila["km"];?>   </p>


  <?php 

echo " <a type='button' class='card-link' href='mensaje.php?idmensaje=$fila[autor]' name='enviar_mensaje' id='enviar_mensaje' value='enviar_mensaje'$_SESSION[id_mensaje]='id_mensaje'; > <i class='bi bi-envelope'> <b> Enviar mensaje </b> </i> </a>";
 echo "<br>";
   echo " <a type='button' class='card-link' href='ventanaanuncios.php?idventana=$fila[id_coche]' name='ventana_modal' id='ventana_modal' value='ventana_modal'$_SESSION[id_coche]='id_coche'; > <b> Ver más </b> </i> </a>"; ?>


</div>   
</div>
</div>
         
          <?php



}
} else {

?>

<div class="card-group">

<div class='card text-white bg-secondary mb-3' style="max-width: 18rem;">

<img class="card-img-top" src="imagenes/<?php echo $fila['imagen'];?>" width="300" height="200" alt="imagen_coche"> 
<div class="card-body">
	<h4 class="card-title" id="titulocar"> <?php echo $fila["titulo_anuncoche"]; ?> </h4>
    <p class="card-text" id="parrafocar">Marca: <?php echo $fila["marca"];?></p>
    <p class="card-text" id="parrafocar">CV: <?php echo $fila["motor"];?>  </p>
    <p class="card-text" id="parrafocar">Kilómetros: <?php echo $fila["km"];?>   </p>
 
   <?php
   echo " <a type='button' class='card-link' href='ventanaanuncios.php?idventana=$fila[id_coche]' name='ventana_modal' id='ventana_modal' value='ventana_modal'$_SESSION[id_coche]='id_coche'; > <b> Ver más </b> </i> </a>"; ?>


</div>
</div>
</div>


          <?php
          }
        ?>
     
<?php 



}




 

?>


<div class="paginacion">
    <?php
    // Si existe el parametro pag
    if (isset($_GET['pag'])) {
        // Si pag es mayor que 1, ponemos un enlace al anterior
        if ($_GET['pag'] > 1) {
            ?>
            <a href="index.php?pag=<?php echo $_GET['pag'] - 1; ?>"><button>Anterior</button></a>
        <?php
                // Sino deshabilito el botón
            } else {
                ?>
            <a href="#"><button disabled>Anterior</button></a>
        <?php
            }
            ?>
 
    <?php
    } else {
        // Sino deshabilito el botón
        ?>
        <a href="#"><button disabled>Anterior</button></a>
        <?php
    }
 
         
 
    // Si existe la paginacion 
    if (isset($_GET['pag'])) {
        // Si el numero de registros actual es superior al maximo
        if ((($pagina) * $numElementos) < $maximoElementos) {
            ?>
        <a href="index.php?pag=<?php echo $_GET['pag'] + 1; ?>"><button>Siguiente</button></a>
    <?php
            // Sino deshabilito el botón
        } else {
            ?>
        <a href="#"><button disabled>Siguiente</button></a>
    <?php
        }
 
        ?>
 
    <?php
        // Sino deshabilito el botón
    } else {
        ?>
        <a href="index.php?pag=2"><button>Siguiente</button></a>
    <?php
    }
 
 
    ?>
 
 
</div>

<?php

}


//creo una funcion para que en la pagina de perfil de cada usuario aparezcan sus anuncios
public function anunciosPerfil() {
$BD=crearConexion("proyecto");
error_reporting(0);
$consulta="SELECT titulo_anuncoche,id_coche,marca FROM coches WHERE autor= '" . $_SESSION['email']. "' ";

$qu=mysqli_query($BD,$consulta);

?>

<h1 id="anunciospublicados"> Anuncios que he publicado: </h1> <br>
<div id="botonesocultar">
<button id="ocultar_coche" onclick="mostrarcoches()"> Ver coches publicados </button>
<button id="ocultar_piezas" onclick="mostrarpiezas()"> Ver piezas publicadas </button>
</div>
<div id="imagenlogo">
    
<img src="imagenes/logo.png" alt="logo">


</div>
<table class="table" id="tabla1">
     <thead class="thead-dark">
        <tr id="perfil_coches">
      <th scope="col" id="id_coches">Marca </th>
      <th scope="col" id="perfil_coches"> Mis coches </th>
      <th scope="col">Eliminar</th>
      <th scope="col">modificar</th>
    </tr>
  </thead>

<?php
while ($cons= mysqli_fetch_assoc($qu)) {

?>



  <tbody>
      <td id="id_coches"> <?php echo $cons ["marca"]; ?> </td>
      <td id="perfil_coches"> <?php echo $cons ["titulo_anuncoche"]; ?>  </td> 
        <td> <?php echo " <a type='button' href='borrar_coches.php?idborrarcoche=$cons[id_coche]' name='Eliminar_anuncio' id='Eliminar_anuncio' value='Eliminar_anuncio' $_SESSION[idborrar]='idborrar'; > <i class='bi bi-trash3-fill'></i> </a>
    " ; ?>

</td>
<td> <?php echo " <a type='button' href='modificar_coche.php?idmodificarcoche=$cons[id_coche]' name='modificar_anuncio' id='modificar_anuncio' value='modificar_anuncio' $_SESSION[idmodificar]='idmodificar'; > <i class='bi bi-pencil-square'></i></a>
    " ; ?>


</td>
    
  </tbody>
		
			
			


<?php } ?>


</table>


<?php }





//creo una funcion para borrar los anuncios de los coches según el ID seleccionado por el usuario

public function idborrar(){

$BD=crearConexion("proyecto");
error_reporting(0);
$consultaB="SELECT * FROM coches WHERE id_coche='" . $_REQUEST['idborrarcoche']. "'";
$consultB=mysqli_query($BD,$consultaB);
return $consultB;
}




public function borrarCoches(){
$BD=crearConexion("proyecto");

$ID=$_POST['id_borrarcoche'];

$q="DELETE FROM coches WHERE id_coche=$ID";
$qu=mysqli_query($BD,$q);
if($qu==true){

echo "Se ha borrado el anuncio correctamente ";
header("refresh:2;url=cuenta.php");

}

}
public function idmodificar(){

$BD=crearConexion("proyecto");
error_reporting(0);
$consultaB="SELECT * FROM coches WHERE id_coche='" . $_REQUEST['idmodificarcoche']. "'";
$consultB=mysqli_query($BD,$consultaB);
return $consultB;
}



public function modificarCoches(){
$BD=crearConexion("proyecto");


$motor=$_POST['motor_coche'];
$descrip=$_POST['descripcion_coche'];
$marca=$_POST['marca_coche'];
$anio=$_POST['anio_coche'];
$tipo=$_POST['tipo_coche'];
$titulo=$_POST['titulo_coche'];
$aut=$_POST['autor_coche'];
$autor=$_POST['id_autor_coche'];



$ID=$_POST['id_modificarcoche'];

$q="UPDATE coches SET marca='$marca',tipo='$tipo',anio='$anio',motor='$motor',anuncio='$descrip', titulo_anuncoche='$titulo' WHERE id_coche='" . $_REQUEST['id_modificarcoche']. "'";
$qu=mysqli_query($BD,$q);
if($qu==true){

echo "Se ha modificado el anuncio correctamente ";


}

}










}



class Pieza{

public $marca;
public $anio;
public $descrip;
public $titulo;

public $conexion;

        public function __constructor($conexion){
            $this->conexion=$conexion;
        }

public function anadirAnuncioPieza(){
$BD=crearConexion("proyecto");
error_reporting(0);

$titulo=$_POST['titulo_pieza'];
$estat=$_POST['estado'];
$descrip=$_POST['descripcion_pieza'];
$marca=$_POST['marca_pieza'];
$anio=$_POST['anio_pieza'];
$precio=$_POST['precio_pieza'];
$imagen=$_POST['imagen_coche'];
$autoremail=$_POST['autor_coche'];
$autor=$_POST['id_autor_coche'];



$q="INSERT INTO repuestos (anio_repuesto, estado_repuesto, marca_repuesto,descrip_repuesto,fk_id_autor, titulo_anunpieza, autor, imagen, precio) VALUES ('$anio', '$estat','$marca','$descrip','$autor', '$titulo', '$autoremail', '$imagen', '$precio')";

$qu=mysqli_query($BD,$q);


if($qu==true){
?>
<br>
<p id="anunciopubli">Anuncio publicado correctamente. Redirigiendo a tu cuenta.... </p>

<?php 
header("refresh:4;url=cuenta.php");


}
}



public function anunciosPerfil() {
$BD=crearConexion("proyecto");
error_reporting(0);
$consulta="SELECT titulo_anunpieza,id_pieza,estado_repuesto FROM repuestos WHERE autor= '" . $_SESSION['email']. "' ";

$qu=mysqli_query($BD,$consulta);

?>


<table class="table" id="tabla2">
     <thead class="thead-dark">
        <tr id="perfil_coches">
      <th scope="col" id="id_coches">Estado </th>
      <th scope="col" id="perfil_coches"> Mis repuestos </th>
      <th scope="col">Eliminar</th>
      <th scope="col">modificar</th>
    </tr>
  </thead>

<?php
while ($cons= mysqli_fetch_assoc($qu)) {

?>
<tbody>
    <tr id="hover">
    <td id="id_coches"> <?php echo $cons ["estado_repuesto"]; ?> </td>
            <td id="perfil_coches"> <?php echo $cons ["titulo_anunpieza"]; ?>  </td> 
 
        <td> <?php echo " <a type='button' href='borrar_piezas.php?idborrarpieza=$cons[id_pieza]' name='Eliminar_anuncio' id='Eliminar_anuncio' value='Eliminar_anuncio' $_SESSION[idborrar]='idborrar'; > <i class='bi bi-trash3-fill'></i> </a> 
    " ; ?>
</td>

<td> <?php echo " <a type='button' href='modificar_pieza.php?idmodificarpieza=$cons[id_pieza]' name='modificar_anuncio' id='modificar_anuncio' value='modificar_anuncio' $_SESSION[idmodificar]='idmodificar'; > <i class='bi bi-pencil-square'></i> </a> 
    " ; ?>

</td>
    </tr>
    
  </tbody>
        
            
            


<?php } ?>


</table>


<?php }




//creo una funcion para borrar los anuncios de los coches según el ID seleccionado por el usuario

public function idborrar(){

$BD=crearConexion("proyecto");
error_reporting(0);
$consultaB="SELECT * FROM repuestos WHERE id_pieza='" . $_REQUEST['idborrarpieza']. "'";
$consultB=mysqli_query($BD,$consultaB);
return $consultB;
}




public function borrarPiezas(){
$BD=crearConexion("proyecto");

$ID=$_POST['id_borrarpieza'];

$q="DELETE FROM repuestos WHERE id_pieza=$ID";
$qu=mysqli_query($BD,$q);
if($qu==true){



echo "Se ha borrado el anuncio correctamente ";
header("refresh:2;url=cuenta.php");


}

}


public function idmodificar(){

$BD=crearConexion("proyecto");
error_reporting(0);
$consultaB="SELECT * FROM repuestos WHERE id_pieza='" . $_REQUEST['idmodificarpieza']. "'";
$consultB=mysqli_query($BD,$consultaB);
return $consultB;
}



public function modificarPieza(){
$BD=crearConexion("proyecto");


$titulo=$_POST['titulo_pieza'];
$descrip=$_POST['descripcion_pieza'];
$marca=$_POST['marca_pieza'];
$anio=$_POST['anio_pieza'];
$estat=$_POST['estado'];
$ID=$_POST['id_modificarpieza'];

$q="UPDATE repuestos SET anio_repuesto='$anio', estado_repuesto='$estat', marca_repuesto='$marca',descrip_repuesto='$descrip', titulo_anunpieza='$titulo' WHERE id_pieza='" . $_REQUEST['id_modificarpieza']. "'";
$qu=mysqli_query($BD,$q);
if($qu==true){

echo "Se ha modificado el anuncio correctamente ";


}

}



//creo una funcion para que se muestren los anuncios de los coches en la pagina principal y además hago la paginación
public function mostraranuncio(){
$BD=crearConexion("proyecto");

$q="SELECT * FROM coches ORDER BY id_coche DESC";

$qu=mysqli_query($BD,$q);

$numElementos = 10;
 
// Recogemos el parametro pag, en caso de que no exista, lo seteamos a 1
if (isset($_GET['pag'])) {
    $pagina = $_GET['pag'];
} else {
    $pagina = 1;
}
 
// (($pagina - 1) * $numElementos) me indica desde donde debemos empezar a mostrar registros
$sql = "SELECT * FROM repuestos LIMIT " . (($pagina - 1) * $numElementos)  . "," . $numElementos;
 
// Ejecutamos la consulta
$resultado = mysqli_query($BD, $sql);
 
// Contamos el número total de registros
$sql = "SELECT count(*) as num_personas FROM repuestos";
 
// Ejecutamos la consulta
$resultadoMaximo = mysqli_query($BD, $sql);
 
// Recojo el numero de registros de forma rápida
$maximoElementos = mysqli_fetch_assoc($resultadoMaximo)['num_personas'];

$q="SELECT * FROM usuarios WHERE email='" . $_SESSION['email']. "'";
$consultB=mysqli_query($BD,$q);
$cons= mysqli_fetch_assoc($consultB);



while($fila=mysqli_fetch_array(/*$qu*/$resultado)){


if(isset($_SESSION['email'])){

if($cons['tipo_usuario']=="comprador"){
    ?>
<div class="card-group">
<div class='card text-white bg-secondary mb-3' style="max-width: 18rem;">
<img class="card-img-top" src="imagenes/<?php echo $fila['imagen'];?>" width="300" height="200" alt="imagen_coche"> 

<div class="card-body">
    <h5 class="card-title" id="titulocar"> <?php echo $fila["titulo_anunpieza"]; ?></h5>
    <p class="card-text">Marca: <?php echo $fila["marca_repuesto"];?></p>
    <p class="card-text">Estado: <?php echo $fila["estado_repuesto"];?>  </p>

  <?php 

echo " <a type='button' class='card-link' href='mensaje.php?idmensaje=$fila[autor]' name='enviar_mensaje' id='enviar_mensaje' value='enviar_mensaje'$_SESSION[id_mensajePiezas]='id_mensajePiezas'; > <i class='bi bi-envelope'> <b> Enviar mensaje </b> </i> </a>";


echo " <a type='button' class='card-link' href='ventanaanunciosP.php?idventanaP=$fila[id_pieza]' name='ventana_modal' id='ventana_modal' value='ventana_modal'$_SESSION[id_pieza]='id_pieza'; > <b> Ver más </b> </i> </a>"; ?>



</div>

</div>
</div>
   
        
         
          <?php

} 

if($cons['tipo_usuario']=="vendedor"){
    ?>
<div class="card-group">
<div class='card text-white bg-secondary mb-3' style="max-width: 18rem;">
<img class="card-img-top" src="imagenes/<?php echo $fila['imagen'];?>" width="300" height="200" alt="imagen_coche"> 

<div class="card-body">
    <h5 class="card-title" id="titulocar"> <?php echo $fila["titulo_anunpieza"]; ?></h5>
    <p class="card-text">Marca: <?php echo $fila["marca_repuesto"];?></p>
    <p class="card-text">Estado: <?php echo $fila["estado_repuesto"];?>  </p>

<?php 
echo " <a type='button' class='card-link' href='ventanaanunciosP.php?idventanaP=$fila[id_pieza]' name='ventana_modal' id='ventana_modal' value='ventana_modal'$_SESSION[id_pieza]='id_pieza'; > <b> Ver más </b> </i> </a>"; ?>


</div>

</div>
</div>
   
        
         
          <?php

}


if($cons['tipo_usuario']=="ambos"){
    ?>
<div class="card-group">
<div class='card text-white bg-secondary mb-3' style="max-width: 18rem;">
<img class="card-img-top" src="imagenes/<?php echo $fila['imagen'];?>" width="300" height="200" alt="imagen_coche"> 

<div class="card-body">
    <h5 class="card-title" id="titulocar"> <?php echo $fila["titulo_anunpieza"]; ?></h5>
    <p class="card-text">Marca: <?php echo $fila["marca_repuesto"];?></p>
    <p class="card-text">Estado: <?php echo $fila["estado_repuesto"];?>  </p>
 

  <?php 

echo " <a type='button' class='card-link' href='mensaje.php?idmensaje=$fila[autor]' name='enviar_mensaje' id='enviar_mensaje' value='enviar_mensaje'$_SESSION[id_mensajePiezas]='id_mensajePiezas'; > <i class='bi bi-envelope'> <b> Enviar mensaje </b> </i> </a>";

 
echo " <a type='button' class='card-link' href='ventanaanunciosP.php?idventanaP=$fila[id_pieza]' name='ventana_modal' id='ventana_modal' value='ventana_modal'$_SESSION[id_pieza]='id_pieza'; > <b> Ver más </b> </i> </a>";

?>

</div>

</div>
</div>
   
        
         
          <?php
}
} else {

    ?>

<div class="card-group">
<div class='card text-white bg-secondary mb-3' style="max-width: 18rem;">
<img class="card-img-top" src="imagenes/<?php echo $fila['imagen'];?>" width="300" height="200" alt="imagen_coche"> 

<div class="card-body">
    <h5 class="card-title" id="titulocar"> <?php echo $fila["titulo_anunpieza"]; ?></h5>
    
    <p class="card-text">Marca: <?php echo $fila["marca_repuesto"];?></p>
    <p class="card-text">Estado: <?php echo $fila["estado_repuesto"];?>  </p>

<?php 
echo " <a type='button' class='card-link' href='ventanaanunciosP.php?idventanaP=$fila[id_pieza]' name='ventana_modal' id='ventana_modal' value='ventana_modal'$_SESSION[id_pieza]='id_pieza'; > <b> Ver más </b> </i> </a>"; ?>
</div>

</div>
</div>
   
        
         
          <?php

}

?>
<?php

}


?>

    <div class="paginacion">
    <?php
    // Si existe el parametro pag
    if (isset($_GET['pag'])) {
        // Si pag es mayor que 1, ponemos un enlace al anterior
        if ($_GET['pag'] > 1) {
            ?>
              <a href="mostrarpiezas.php?pag=<?php echo $_GET['pag']-1; ?>"><button>Anterior</button></a>
        <?php
                // Sino deshabilito el botón
            } else {
                ?>
            <a href="#"><button disabled>Anterior</button></a>
        <?php
            }
            ?>
 
    <?php
    } else {
        // Sino deshabilito el botón
        ?>
        <a href="#"><button disabled>Anterior</button></a>
        <?php
    }
 
         
 
    // Si existe la paginacion 
    if (isset($_GET['pag'])) {
        // Si el numero de registros actual es superior al maximo
        if ((($pagina) * $numElementos) < $maximoElementos) {
            ?>
        <a href="mostrarpiezas.php?pag=<?php echo $_GET['pag'] + 1; ?>"><button>Siguiente</button></a>
    <?php
            // Sino deshabilito el botón
        } else {
            ?>
        <a href="#"><button disabled>Siguiente</button></a>
    <?php
        }
 
        ?>
 
    <?php
        // Sino deshabilito el botón
    } else {
        ?>
       <a href="mostrarpiezas.php?pag=2"><button>Siguiente</button></a>
    <?php
    }
 
 
    ?>
 
 
</div>

<?php

}

}

//Ahora vamos a crear 3 funciones para el envío de mensajes en los anuncios de los coches

function recogerMensaje(){

$destinatario=$_POST['destinatario'];
$asunto=$_POST['asunto'];
$mensaje=$_POST['mensaje'];
$remitente=$_POST['remitente'];
$headers = "Remitente:" . $remitente;
mail($destinatario, $asunto, "From: " . $remitente, $mensaje);
header("Location:mensaje_envio.php");

}


function id_mensaje(){

$BD=crearConexion("proyecto");
error_reporting(0);
$consultaB="SELECT * FROM coches";
$consultB=mysqli_query($BD,$consultaB);
return $consultB;
}


function insertarmensaje(){

$BD=crearConexion("proyecto");

$destinatario=$_POST['destinatario'];
$asunto=$_POST['asunto'];
$mensaje=$_POST['mensaje'];
$id=$_POST['idautor'];
$remitente=$_POST['remitente'];

$q="INSERT INTO mensajes (destinatario,titulo,cuerpo, fk_id, remitente) VALUES ('$destinatario','$asunto','$mensaje', '$id', '$remitente')";
$qu=mysqli_query($BD,$q);

/*if($qu==true){

echo " Mensaje guardado correctamente";


}*/

}


//Ahora vamos a crear 3 funciones para el envío de mensajes en los anuncios de las piezas


function id_mensajePiezas(){

$BD=crearConexion("proyecto");
error_reporting(0);
$consultaB="SELECT * FROM repuestos";
$consultB=mysqli_query($BD,$consultaB);
return $consultB;
}


//Funciones para la comprobacion de vendedor, comprador, ambos o visitante

function comprador(){
	$BD=crearConexion("proyecto");
	$q="SELECT tipo_usuario FROM usuarios WHERE email='" . $_SESSION['email']. "' AND tipo_usuario='comprador'";
	$consultB=mysqli_query($BD,$consultaB);
	return $consultB;

}

function vendedor(){
	$BD=crearConexion("proyecto");
	$q="SELECT tipo_usuario FROM usuarios WHERE email='" . $_SESSION['email']. "'AND tipo_usuario='vendedor'";
	$consultB=mysqli_query($BD,$consultaB);
	return $consultB;

}

function ambos(){
	$BD=crearConexion("proyecto");
	$q="SELECT tipo_usuario FROM usuarios WHERE tipo_usuario='ambos'";
	$consultB=mysqli_query($BD,$consultaB);
	return $consultB;

}

/*
function tipousuario(){
session_start();

return $consulB;

}

*/

//creo una función para añadir una barra como cabecera en todas las páginas

function barra(){
$BD=crearConexion("proyecto");
$q="SELECT * FROM usuarios WHERE email='" . $_SESSION['email']. "'";
$consultB=mysqli_query($BD,$q);
$cons= mysqli_fetch_assoc($consultB);

if(isset($_SESSION['email'])){ 
 
if($cons['tipo_usuario']=="vendedor"){ ?>

<ul class="barra">
<li  id="titulo"> <h3 class="titulo"> <a class="barra3" type="button" id="acceso" href="index.php" name="idacceder" value="Acceder"> RecaCoche </a> </h3> </li>
<li class="barra2">
		
<a class="barra3" type='button' id='acceso' href='cuenta.php' name='idcuenta' value='cuenta'> Mi cuenta </a> </li>

<li class="barra2"> <a class="barra3" type="button" id="acceso" href="cerrar_sesion.php" name="cerrarsesion" value="sesion"> Cerrar Sesión </a> </li></ul>

<?php } 

if($cons['tipo_usuario']=="comprador"){ ?>
<ul class="barra">
<li  id="titulo"> <h3 class="titulo"> <a class="barra3" type="button" id="acceso" href="index.php" name="idacceder" value="Acceder"> RecaCoche </a> </h3> </li>
<li class="barra2">
<a class="barra3" type="button" id="acceso" href="cerrar_sesion.php" name="cerrarsesion" value="sesion"> Cerrar Sesión </a> </li></ul>



<?php } 

if($cons['tipo_usuario']=="ambos"){ ?>
<ul class="barra">
<li  id="titulo"> <h3 class="titulo"> <a class="barra3" type="button" id="acceso" href="index.php" name="idacceder" value="Acceder"> RecaCoche </a> </h3> </li>
<li class="barra2"> <a class="barra3" type='button' id='acceso' href='cuenta.php' name='idcuenta' value='cuenta'> Mi cuenta </a> </li>		
<li class="barra2"> <a class="barra3" type="button" id="acceso" href="cerrar_sesion.php" name="cerrarsesion" value="sesion"> Cerrar Sesión </a> </li> </ul>

<?php } ?>





<?php } else { ?>

<ul class="barra">
<li  id="titulo"> <h3 class="titulo"> <a class="barra3" type="button" id="acceso" href="index.php" name="idacceder" value="Acceder"> RecaCoche </a> </h3> </li>
<li class="barra2"> <a class="barra3" type="button" id="acceso" href="login.php" name="idacceder" value="Acceder"> Acceder </a> </li> </ul>



</div></div>


 


<?php } } 


//Código para recoger lo que el usuario inserta en el buscador y realizar la busqueda en la BBDD
function buscar(){

$BD=crearConexion("proyecto");
if (isset($_POST['search'])) {
    
    //Creo una variable para que recoja lo que escribe por teclado
    $keywords = $_POST['keywords'];

    //Realizo la consulta en la base de datos:

    $query = "SELECT * FROM coches WHERE marca LIKE '%$keywords%'";

    $query_searched = mysqli_query($BD, $query);

    $count_results = mysqli_num_rows($query_searched);

    // Ahora realizo una consulta que me servirá para saber el tipo de usuario que tiene abierta la sesion
    $q="SELECT * FROM usuarios WHERE email='" . $_SESSION['email']. "'";
    $consultB=mysqli_query($BD,$q);
    $cons= mysqli_fetch_assoc($consultB);

    /*Hago un if para saber si hay resultados de la búsqueda, y en caso de que haya que los busque y los ponga en el formato
    de las tarjetas que he elegido en la página principal*/

    if ($count_results > 0) {
         echo "<br>";
        echo '<div id="buscarcoches">  ';
        echo '<h2 id="buscarR">Se han encontrado '.$count_results.' resultados:</h2>';
        echo '</div>';
        echo "<br>";

    //Hago un bucle while para que se vaya mostrando los resultados

while ($row_searched = mysqli_fetch_array($query_searched)) {

/*El if siguiente sirve para saber el tipo de usuario conectado, y en funcion de eso, mostrar mas o menos acciones en las tarjetas*/            

if(isset($_SESSION['email'])){


if($cons['tipo_usuario']=="comprador"){


?>

<div class="card-group">

<div class='card text-white bg-secondary mb-3' style="max-width: 18rem;">

<img class="card-img-top" src="imagenes/<?php echo $row_searched['imagen'];?>" width="300" height="200" alt="imagen_coche"> 
<div class="card-body">
    <h5 class="card-title"> <?php echo $row_searched["titulo_anuncoche"]; ?></h5>
  
    <p class="card-text">Marca: <?php echo $row_searched["marca"];?></p>
    <p class="card-text">CV: <?php echo $row_searched["motor"];?>  </p>
    
    <p class="card-text">Kilómetros: <?php echo $row_searched["km"];?>   </p>

  


  <?php 

echo " <a type='button' class='card-link' href='mensaje.php?idmensaje=$row_searched[autor]' name='enviar_mensaje' id='enviar_mensaje' value='enviar_mensaje'$_SESSION[id_mensaje]='id_mensaje'; > <i class='bi bi-envelope'> <b> Enviar mensaje </b> </i> </a>";
echo "<br>";

echo " <a type='button' class='card-link' href='ventanaanuncios.php?idventana=$fila[id_coche]' name='ventana_modal' id='ventana_modal' value='ventana_modal'$_SESSION[id_coche]='id_coche'; > <b> Ver más </b> </i> </a>";

?>

</div>
</div>
</div> 
         
          <?php

}


if($cons['tipo_usuario']=="vendedor"){


?>

<div class="card-group">

<div class='card text-white bg-secondary mb-3' style="max-width: 18rem;">

<img class="card-img-top" src="imagenes/<?php echo $row_searched['imagen'];?>" width="300" height="200" alt="imagen_coche"> 
<div class="card-body">
    <h5 class="card-title"> <?php echo $row_searched["titulo_anuncoche"]; ?></h5>
    
    <p class="card-text">Marca: <?php echo $row_searched["marca"];?></p>
    <p class="card-text">CV: <?php echo $row_searched["motor"];?>  </p>
    
    <p class="card-text">Kilómetros: <?php echo $row_searched["km"];?>   </p>
    

<?php 
echo "<br>";

echo " <a type='button' class='card-link' href='ventanaanuncios.php?idventana=$fila[id_coche]' name='ventana_modal' id='ventana_modal' value='ventana_modal'$_SESSION[id_coche]='id_coche'; > <b> Ver más </b> </i> </a>";
?>
</div>
</div>
</div>
 
          <?php

}


if($cons['tipo_usuario']=="ambos"){

?>

<div class="card-group">

<div class='card text-white bg-secondary mb-3' style="max-width: 18rem;">

<img class="card-img-top" src="imagenes/<?php echo $row_searched['imagen'];?>" width="300" height="200" alt="imagen_coche"> 
<div class="card-body">
    <h5 class="card-title"> <?php echo $row_searched["titulo_anuncoche"]; ?></h5>
 
    <p class="card-text">Marca: <?php echo $row_searched["marca"];?></p>
    <p class="card-text">CV: <?php echo $row_searched["motor"];?>  </p>
    
    <p class="card-text">Kilómetros: <?php echo $row_searched["km"];?>   </p>




  <?php 

echo " <a type='button' class='card-link' href='mensaje.php?idmensaje=$row_searched[autor]' name='enviar_mensaje' id='enviar_mensaje' value='enviar_mensaje'$_SESSION[id_mensaje]='id_mensaje'; > <i class='bi bi-envelope'> <b> Enviar mensaje </b> </i> </a>";

echo "<br>";

echo " <a type='button' class='card-link' href='ventanaanuncios.php?idventana=$fila[id_coche]' name='ventana_modal' id='ventana_modal' value='ventana_modal'$_SESSION[id_coche]='id_coche'; > <b> Ver más </b> </i> </a>";
?>


</div>   
</div>
</div>
         
          <?php



}
} else {

?>

<div class="card-group">

<div class='card text-white bg-secondary mb-3' style="max-width: 18rem;">

<img class="card-img-top" src="imagenes/<?php echo $row_searched['imagen'];?>" width="300" height="200" alt="imagen_coche"> 
<div class="card-body">
    <h4 class="card-title"> <?php echo $row_searched["titulo_anuncoche"]; ?></h4>
   
    <p class="card-text">Marca: <?php echo $row_searched["marca"];?></p>
    <p class="card-text">CV: <?php echo $row_searched["motor"];?>  </p>
    <p class="card-text">Kilómetros: <?php echo $row_searched["km"];?>   </p>
    

<?php 

echo "<br>";

echo " <a type='button' class='card-link' href='ventanaanuncios.php?idventana=$fila[id_coche]' name='ventana_modal' id='ventana_modal' value='ventana_modal'$_SESSION[id_coche]='id_coche'; > <b> Ver más </b> </i> </a>";
?>


</div>
</div>
</div>


          <?php
          }
        ?>
     
<?php 



}

    }
    else {
        //Si no hay registros encontrados
        echo '<h2>No se encuentran resultados con los criterios de búsqueda.</h2>';
    }
}



}


function mostrarA(){

$BD=crearConexion("proyecto");


if($_REQUEST['idventana']){
//echo "hola" . $_REQUEST['idventana'];
$consulta="SELECT * FROM coches WHERE id_coche='".$_REQUEST['idventana']."'";
$q="SELECT * FROM usuarios WHERE email='" . $_SESSION['email']. "'";
$consultB=mysqli_query($BD,$q);
$cons= mysqli_fetch_assoc($consultB);

$qu=mysqli_query($BD,$consulta);

while ($fila= mysqli_fetch_array($qu)) { 
    if(isset($_SESSION['email'])){

if($cons['tipo_usuario']=="comprador"){ ?>
    <div id="tarjetaA">

<img src="imagenes/<?php echo $fila['imagen'];?>" width="500" height="400" alt="imagen_coche">

</div>
<br>
<div id="contenidoA">
     
    <h1 > <?php echo $fila["titulo_anuncoche"]; ?></h1> <br>
    <p> <b>Descripción:</b> <?php echo $fila["anuncio"];?></p> 
    <p > <b> Marca:</b> <?php echo $fila["marca"];?></p>
    <p ><b> CV: </b> <?php echo $fila["motor"];?>  </p>
    <p ><b>Kilómetros: </b> <?php echo $fila["km"];?>   </p>
     <p ><b> Tipo:</b> <?php echo $fila["tipo"];?>  </p>
     <p ><b> Año del vehículo:</b> <?php echo $fila["anio"];?> </p>
      <p ><b> Precio:</b> <?php echo $fila["precio"];?> € </p>

        <?php 

echo " <a type='button' class='card-link' href='mensaje.php?idmensaje=$fila[autor]' name='enviar_mensaje' id='enviar_mensaje' value='enviar_mensaje'$_SESSION[id_mensaje]='id_mensaje'; > <i class='bi bi-envelope'> <b> Enviar mensaje </b> </i> </a>"; ?>


</div>


<?php 


}


if($cons['tipo_usuario']=="vendedor"){ ?>
    <div id="tarjetaA">

<img src="imagenes/<?php echo $fila['imagen'];?>" width="500" height="400" alt="imagen_coche">

</div>
<br>
<div id="contenidoA">
     
    <h1 > <?php echo $fila["titulo_anuncoche"]; ?></h1> <br>
    <p> <b>Descripción:</b> <?php echo $fila["anuncio"];?></p> 
    <p > <b> Marca:</b> <?php echo $fila["marca"];?></p>
    <p ><b> CV: </b> <?php echo $fila["motor"];?>  </p>
    <p ><b>Kilómetros: </b> <?php echo $fila["km"];?>   </p>
     <p ><b> Tipo:</b> <?php echo $fila["tipo"];?>  </p>
     <p ><b> Año del vehículo:</b> <?php echo $fila["anio"];?> </p>
      <p ><b> Precio:</b> <?php echo $fila["precio"];?> € </p>


</div>


<?php 


}

if($cons['tipo_usuario']=="ambos"){ ?>
    <div id="tarjetaA">

<img src="imagenes/<?php echo $fila['imagen'];?>" width="500" height="400" alt="imagen_coche">

</div>
<br>
<div id="contenidoA">
     
    <h1 > <?php echo $fila["titulo_anuncoche"]; ?></h1> <br>
    <p> <b>Descripción:</b> <?php echo $fila["anuncio"];?></p> 
    <p > <b> Marca:</b> <?php echo $fila["marca"];?></p>
    <p ><b> CV: </b> <?php echo $fila["motor"];?>  </p>
    <p ><b>Kilómetros: </b> <?php echo $fila["km"];?>   </p>
     <p ><b> Tipo:</b> <?php echo $fila["tipo"];?>  </p>
     <p ><b> Año del vehículo:</b> <?php echo $fila["anio"];?> </p>
      <p ><b> Precio:</b> <?php echo $fila["precio"];?> € </p>

         <?php 

echo " <a type='button' class='card-link' href='mensaje.php?idmensaje=$fila[autor]' name='enviar_mensaje' id='enviar_mensaje' value='enviar_mensaje'$_SESSION[id_mensaje]='id_mensaje'; > <i class='bi bi-envelope'> <b> Enviar mensaje </b> </i> </a>"; ?>

</div>


<?php 


}
} else { ?>

    <div id="tarjetaA">

<img src="imagenes/<?php echo $fila['imagen'];?>" width="500" height="400" alt="imagen_coche">

</div>
<br>
<div id="contenidoA">
     
    <h1 > <?php echo $fila["titulo_anuncoche"]; ?></h1> <br>
    <p> <b>Descripción:</b> <?php echo $fila["anuncio"];?></p> 
    <p > <b> Marca:</b> <?php echo $fila["marca"];?></p>
    <p ><b> CV: </b> <?php echo $fila["motor"];?>  </p>
    <p ><b>Kilómetros: </b> <?php echo $fila["km"];?>   </p>
     <p ><b> Tipo:</b> <?php echo $fila["tipo"];?>  </p>
     <p ><b> Año del vehículo:</b> <?php echo $fila["anio"];?> </p>
      <p ><b> Precio:</b> <?php echo $fila["precio"];?> € </p>


</div>


<?php 
}

?>









<?php 


}



}



}



function mostrarP(){

$BD=crearConexion("proyecto");


if($_REQUEST['idventanaP']){
//echo "hola" . $_REQUEST['idventana'];
$consulta="SELECT * FROM repuestos WHERE id_pieza='".$_REQUEST['idventanaP']."'";
$q="SELECT * FROM usuarios WHERE email='" . $_SESSION['email']. "'";
$consultB=mysqli_query($BD,$q);
$cons= mysqli_fetch_assoc($consultB);

$qu=mysqli_query($BD,$consulta);

while ($fila= mysqli_fetch_array($qu)) { 
    if(isset($_SESSION['email'])){

if($cons['tipo_usuario']=="comprador"){ ?>
    <div id="tarjetaA">

<img src="imagenes/<?php echo $fila['imagen'];?>" width="500" height="400" alt="imagen_coche">

</div>
<br>
<div id="contenidoA">
     
    <h1 > <?php echo $fila["titulo_anunpieza"]; ?></h1> <br>
    <p> <b>Descripción:</b> <?php echo $fila["descrip_repuesto"];?></p> 
    <p > <b> Marca:</b> <?php echo $fila["marca_repuesto"];?></p>
    <p ><b> Estado del repuesto: </b> <?php echo $fila["estado_repuesto"];?>  </p>
    <p ><b>Año: </b> <?php echo $fila["anio_repuesto"];?>   </p>
      <p ><b> Precio:</b> <?php echo $fila["precio"];?> € </p>

        <?php 

echo " <a type='button' class='card-link' href='mensaje.php?idmensaje=$fila[autor]' name='enviar_mensaje' id='enviar_mensaje' value='enviar_mensaje'$_SESSION[id_mensaje]='id_mensaje'; > <i class='bi bi-envelope'> <b> Enviar mensaje </b> </i> </a>"; ?>


</div>


<?php 


}


if($cons['tipo_usuario']=="vendedor"){ ?>
     <div id="tarjetaA">

<img src="imagenes/<?php echo $fila['imagen'];?>" width="500" height="400" alt="imagen_coche">

</div>
<br>
<div id="contenidoA">
     
    <h1 > <?php echo $fila["titulo_anunpieza"]; ?></h1> <br>
    <p> <b>Descripción:</b> <?php echo $fila["descrip_repuesto"];?></p> 
    <p > <b> Marca:</b> <?php echo $fila["marca_repuesto"];?></p>
    <p ><b> Estado del repuesto: </b> <?php echo $fila["estado_repuesto"];?>  </p>
    <p ><b>Año: </b> <?php echo $fila["anio_repuesto"];?>   </p>
      <p ><b> Precio:</b> <?php echo $fila["precio"];?> € </p>




</div>

<?php 


}

if($cons['tipo_usuario']=="ambos"){ ?>
     <div id="tarjetaA">

<img src="imagenes/<?php echo $fila['imagen'];?>" width="500" height="400" alt="imagen_coche">

</div>
<br>
<div id="contenidoA">
     
    <h1 > <?php echo $fila["titulo_anunpieza"]; ?></h1> <br>
    <p> <b>Descripción:</b> <?php echo $fila["descrip_repuesto"];?></p> 
    <p > <b> Marca:</b> <?php echo $fila["marca_repuesto"];?></p>
    <p ><b> Estado del repuesto: </b> <?php echo $fila["estado_repuesto"];?>  </p>
    <p ><b>Año: </b> <?php echo $fila["anio_repuesto"];?>   </p>
      <p ><b> Precio:</b> <?php echo $fila["precio"];?> € </p>

        <?php 

echo " <a type='button' class='card-link' href='mensaje.php?idmensaje=$fila[autor]' name='enviar_mensaje' id='enviar_mensaje' value='enviar_mensaje'$_SESSION[id_mensaje]='id_mensaje'; > <i class='bi bi-envelope'> <b> Enviar mensaje </b> </i> </a>"; ?>


</div>

<?php 


}
} else { ?>

     <div id="tarjetaA">

<img src="imagenes/<?php echo $fila['imagen'];?>" width="500" height="400" alt="imagen_coche">

</div>
<br>
<div id="contenidoA">
     
    <h1 > <?php echo $fila["titulo_anunpieza"]; ?></h1> <br>
    <p> <b>Descripción:</b> <?php echo $fila["descrip_repuesto"];?></p> 
    <p > <b> Marca:</b> <?php echo $fila["marca_repuesto"];?></p>
    <p ><b> Estado del repuesto: </b> <?php echo $fila["estado_repuesto"];?>  </p>
    <p ><b>Año: </b> <?php echo $fila["anio_repuesto"];?>   </p>
      <p ><b> Precio:</b> <?php echo $fila["precio"];?> € </p>


</div>


<?php 
}

?>









<?php 


}



}






}






//Código para añadir en la pagina "busquedap" para que busque la marca de la pieza que el usuario introduzca por pantalla

function buscarP(){
$BD=crearConexion("proyecto");

$q="SELECT * FROM usuarios WHERE email='" . $_SESSION['email']. "'";
$consultB=mysqli_query($BD,$q);
$cons= mysqli_fetch_assoc($consultB);


if (isset($_POST['buscar'])) {
    //Recogemos las claves enviadas
    $keywords = $_POST['palabras'];

    //Conectamos con la base de datos en la que vamos a buscar

    $query = "SELECT * FROM repuestos WHERE marca_repuesto LIKE '%$keywords%'";

    $query_searched = mysqli_query($BD, $query);

    $count_results = mysqli_num_rows($query_searched);

    //Si hay resultados
    if ($count_results > 0) {
         echo "<br>";
        echo '<div id="buscarcoches">  ';
        echo '<h2 id="buscarR">Se han encontrado '.$count_results.' resultados:</h2>';
        echo '</div>';
        echo "<br>";
        while ($row_searched = mysqli_fetch_array($query_searched)) {
            //En este caso solo mostramos el titulo y fecha de la entrada

if(isset($_SESSION['email'])){

if($cons['tipo_usuario']=="comprador"){
    ?>
<div class="card-group">
<div class='card text-white bg-secondary mb-3' style="max-width: 18rem;">
<img class="card-img-top" src="imagenes/<?php echo $row_searched['imagen'];?>" width="300" height="200" alt="imagen_coche"> 

<div class="card-body">
    <h5 class="card-title"> <?php echo $row_searched["titulo_anunpieza"]; ?></h5>
    <p class="card-text"><?php echo $row_searched["descrip_repuesto"];?></p>
    <p class="card-text">Marca: <?php echo $row_searched["marca_repuesto"];?></p>
    <p class="card-text">Estado: <?php echo $row_searched["estado_repuesto"];?>  </p>
    <p class="card-text"> Precio: <?php echo $row_searched["precio"];?> € </p>

  <?php 

echo " <a type='button' class='card-link' href='mensaje.php?idmensaje=$row_searched[autor]' name='enviar_mensaje' id='enviar_mensaje' value='enviar_mensaje'$_SESSION[id_mensajePiezas]='id_mensajePiezas'; > <i class='bi bi-envelope'> <b> Enviar mensaje </b> </i> </a>";


?>

</div>

</div>
</div>
   
        
         
          <?php

} 

if($cons['tipo_usuario']=="vendedor"){
    ?>
<div class="card-group">
<div class='card text-white bg-secondary mb-3' style="max-width: 18rem;">
<img class="card-img-top" src="imagenes/<?php echo $row_searched['imagen'];?>" width="300" height="200" alt="imagen_coche"> 

<div class="card-body">
    <h5 class="card-title"> <?php echo $row_searched["titulo_anunpieza"]; ?></h5>
    <p class="card-text"><?php echo $row_searched["descrip_repuesto"];?></p>
    <p class="card-text">Marca: <?php echo $row_searched["marca_repuesto"];?></p>
    <p class="card-text">Estado: <?php echo $row_searched["estado_repuesto"];?>  </p>
    
<p class="card-text"> Precio: <?php echo $row_searched["precio"];?> € </p>
</div>

</div>
</div>
   
        
         
          <?php

}


if($cons['tipo_usuario']=="ambos"){
    ?>
<div class="card-group">
<div class='card text-white bg-secondary mb-3' style="max-width: 18rem;">
<img class="card-img-top" src="imagenes/<?php echo $row_searched['imagen'];?>" width="300" height="200" alt="imagen_coche"> 

<div class="card-body">
    <h5 class="card-title"> <?php echo $row_searched["titulo_anunpieza"]; ?></h5>
    <p class="card-text"><?php echo $row_searched["descrip_repuesto"];?></p>
    <p class="card-text">Marca: <?php echo $row_searched["marca_repuesto"];?></p>
    <p class="card-text">Estado: <?php echo $row_searched["estado_repuesto"];?>  </p>
    <p class="card-text"> Precio: <?php echo $row_searched["precio"];?> € </p>

  <?php 

echo " <a type='button' class='card-link' href='mensaje.php?idmensaje=$row_searched[autor]' name='enviar_mensaje' id='enviar_mensaje' value='enviar_mensaje'$_SESSION[id_mensajePiezas]='id_mensajePiezas'; > <i class='bi bi-envelope'> <b> Enviar mensaje </b> </i> </a>";


?>

</div>

</div>
</div>
   
        
         
          <?php
}
} else {

    ?>

<div class="card-group">
<div class='card text-white bg-secondary mb-3' style="max-width: 18rem;">
<img class="card-img-top" src="imagenes/<?php echo $row_searched['imagen'];?>" width="300" height="200" alt="imagen_coche"> 

<div class="card-body">
    <h5 class="card-title"> <?php echo $row_searched["titulo_anunpieza"]; ?></h5>
    <p class="card-text"><?php echo $row_searched["descrip_repuesto"];?></p>
    <p class="card-text">Marca: <?php echo $row_searched["marca_repuesto"];?></p>
    <p class="card-text">Estado: <?php echo $row_searched["estado_repuesto"];?>  </p>
<p class="card-text"> Precio: <?php echo $row_searched["precio"];?> € </p>
</div>

</div>
</div>
   
        
         
          <?php

}
        ?>
     
<?php 



}





           /* echo '<li><a href="#">'.$row_searched['titulo'].' ('.$row_searched['anuncio'].')</a></li>';
        }
        echo '</ul>';*/
    }
    else {
        //Si no hay registros encontrados
        echo '<h2>No se encuentran resultados con los criterios de búsqueda.</h2>';
    }
}
















}

































?>
















