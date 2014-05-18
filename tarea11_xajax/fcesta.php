<?php

// Incluimos la lilbrería Xajax
require_once('./include/xajax_core/xajax.inc.php');
require_once('./include/DB.php');
require_once('./include/CestaCompra.php');

// Creamos el objeto xajax
$xajax = new xajax();

// Registramos la función que vamos a llamar desde JavaScript
$xajax->register(XAJAX_FUNCTION,"cargarCesta");
$xajax->register(XAJAX_FUNCTION,"vaciarCesta");

$xajax->configure('javascript URI','./include/');

// El método processRequest procesa las peticiones que llegan a la página
// Debe ser llamado antes del código HTML
$xajax->processRequest();

function cargarCesta($codigo){ 
  $respuesta = new xajaxResponse();
  $cesta = CestaCompra::carga_cesta();  
  $cesta->nuevo_articulo($codigo); // agregamos un nuevo prod. a la cesta
  $cesta->guarda_cesta(); // guardamos la cesta
  $producto = DB::obtieneProducto($codigo);
  if ($cesta->vacia()) {
    $respuesta->clear("contenido", "innerHTML");
  } 
  //$respuesta->assign("contenido", "innerHTML", "<p>" .$producto->getcodigo() . "</p>");
  $respuesta->append("contenido", "innerHTML", "<p>" .$producto->getcodigo() . "</p>");
  
  $respuesta->assign("btncomprar", "disabled", false);
  $respuesta->assign("btnvaciar", "disabled", false);
  $respuesta->setReturnValue($cesta);
  return $respuesta;
}

function vaciarCesta() {
   $respuesta = new xajaxResponse();
   unset($_SESSION['cesta']);
   $cesta = new CestaCompra();
   $respuesta->setReturnValue($cesta);
   $respuesta->assign("contenido", "innerHTML", '<p>Cesta recien vacía</p>');
   $respuesta->assign("btncomprar", "disabled", true);
   $respuesta->assign("btnvaciar", "disabled", true);
   return $respuesta;
}