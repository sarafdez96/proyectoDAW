/*$(document).ready(function(){

  $("hide").submit(function()
{
    $("ocultar").hide();
    return true;
});

  
});


*/


//Creo varias funciones para que al clicar sobre un botón nos redirija a un enlace

function publicaranuncio(){

location.href="anuncios_coches.php";

}

function publicaranuncioP(){

location.href="anuncios_piezas.php";

}

function piezasinicio() {

location.href="mostrarpiezas.php";

}


function cochesinicio() {

location.href="index.php";

}

/* Creo dos funciones para que en la página "mi cuenta" al clicar sobre un botón aparezca la tabla correspondiente
(coche o pieza) en función del botón que clique aparecerá una tabla y se esconderá la otra. Por defecto, ambas tablas 
están escondidas */

function mostrarpiezas(){

var ocultar1=document.getElementById("tabla1");
var mostrar1=document.getElementById("tabla2");
mostrar1.style.display = "block";
ocultar1.style.display = "none";

}

function mostrarcoches(){

var ocultar2=document.getElementById("tabla2");
var mostrar2=document.getElementById("tabla1");

mostrar2.style.display = "block";
ocultar2.style.display = "none";


}


/*Bloqueo el input del formulario para introducuir el email al añadir un anuncio, ya que simplemente
quiero que sea a título informativo*/

/*var bloqueo=document.getElementById("autor_coche");
bloqueo.disabled=true;*/

//codigo jquery para insertar un icono que nos lleve hacia arriba de la pagina una vez que hemos hecho scroll abajo del todo

$(document).ready(function(){

  $('.subir').click(function(){
    $('body, html').animate({
      scrollTop: '0px'
    }, 300);
  });

  $(window).scroll(function(){
    if( $(this).scrollTop() > 0 ){
      $('.subir').slideDown(300);
    } else {
      $('.subir').slideUp(300);
    }
  });

/*código para que el usuario no pueda insertar letras en el hueco en el que se solicita el número de teléfono*/

$('#telefono').keypress(function(tecla) {
        if(tecla.charCode < 48 || tecla.charCode > 57) return false;
    });




});



//Creo una función para que aparezca un alert a la hora de confirmar que se está eliminando un anuncio
function eliminar (){

var mensaje="¿Estás seguro de que deseas eliminar el anuncio?";
alert(mensaje);

}

/*
function ocultar_form(){

var ocultar=document.getElementById("elimi_C");
ocultar.style.display = "none";

}*/
/*
$(document).ready(function(){
    $('#open').on('click', function(){
        $('#popup').fadeIn('slow');
        $('.popup-overlay').fadeIn('slow');
        $('.popup-overlay').height($(window).height());
        return false;
    });
 
    $('#close').on('click', function(){
        $('#popup').fadeOut('slow');
        $('.popup-overlay').fadeOut('slow');
        return false;
    });
});*/


/*Código para reloj*/
function actualH() {
        var fecha=new Date(); 
          var segundo=fecha.getSeconds(); 
         var minuto=fecha.getMinutes(); 
        var hora=fecha.getHours();
         if (hora<10) { 
            hora="0"+hora;
            }
         else if (minuto<10) { 
            minuto="0"+minuto;
            }
        else if (segundo<10) { 
            segundo="0"+segundo;
            }
        var relojM;
         relojM = hora+" : "+minuto+" : "+segundo; 
         return relojM; 
         }
function actualizarH() { 
  var horaM;
   horaM=actualH(); 
   relojM=document.getElementById("reloj"); 
   relojM.innerHTML=horaM; 
   }
setInterval(actualizarH,1000); 