<?php
//incluímos la clase ajax
require ('./xajax_core//xajax.inc.php');

//instanciamos el objeto de la clase xajax
$xajax = new xajax();

function si_no($entrada) {
  if ($entrada == "true") {
    $salida = "Marcado";
  } else {
    $salida = "No marcado";
  }

  //instanciamos el objeto para generar la respuesta con ajax
  $respuesta = new xajaxResponse();
  //escribimos en la capa con id="respuesta" el texto que aparece en $salida
  $respuesta->addAssign("respuesta", "innerHTML", $salida);

  //tenemos que devolver la instanciación del objeto xajaxResponse
  return $respuesta;
}

//asociamos la función creada anteriormente al objeto xajax
$xajax->register(XAJAX_FUNCTION,"si_no");
//$xajax->registerFunction("si_no");

// Y configuramos la ruta en que se encuentra la carpeta xajax_js
$xajax->configure('javascript URI','./');

//El objeto xajax tiene que procesar cualquier petición
$xajax->processRequest();
//$xajax->processRequests();
?>

<html>
  <head>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html;charset=ISO-8859-1">
      <title>Si / No en Ajax</title>
      <?php
      //En el <head> indicamos al objeto xajax se encargue de generar el javascript necesario
      $xajax->printJavascript();
      ?>
  </head>

  <body>
    <div id="respuesta"></div>
    <form name="formulario">
      <input type="checkbox" name="si" value="1" onclick="xajax_si_no(document.formulario.si.checked)">
    </form>

    <script type="text/javascript">
      xajax_si_no(document.formulario.si.checked); //Llamando inicialmente a la función xajax_si_no inicializamos el valor de la capa con la respuesta
    </script>
  </body>
</html> 