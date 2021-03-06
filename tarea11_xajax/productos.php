<?php

require_once('include/DB.php');
require_once('include/CestaCompra.php');

// Incluimos la lilbrería Xajax
require_once('include/xajax_core/xajax.inc.php');

// Creamos el objeto xajax
$xajax = new xajax('fcesta.php');

// Registramos la función que vamos a llamar desde JavaScript
$xajax->register(XAJAX_FUNCTION,"cargarCesta");
$xajax->register(XAJAX_FUNCTION,"vaciarCesta");

// Y configuramos la ruta en que se encuentra la carpeta xajax_js
$xajax->configure('javascript URI','./include/');
//$xajax->configure('debug',true)

// Recuperamos la información de la sesión
session_start();

// Y comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['usuario']))
  die("Error - debe <a href='login.php'>identificarse</a>.<br />");

// Recuperamos la cesta de la compra
$cesta = CestaCompra::carga_cesta();
var_dump($cesta);
// Comprobamos si se ha enviado el formulario de vaciar la cesta
if (isset($_POST['vaciar'])) {
  unset($_SESSION['cesta']);
  $cesta = new CestaCompra();
}

// Comprobamos si se quiere añadir un producto a la cesta
/*
if (isset($_POST['enviar'])) {
    $cesta->nuevo_articulo($_POST['cod']);
    $cesta->guarda_cesta();
}
 */

// Cuando se vaya a enviar el formulario ejecutamos
// una función en JavaScript, que realiza la llamada a PHP
//<form id='datos' action='productos.php' method='post' onsubmit='return enviarFormulario();'>
function creaFormularioProductos() {
  $productos = DB::obtieneProductos();
  
  foreach ($productos as $p) {
    $codigo = $p->getcodigo();
     echo "<p><form id='" . $codigo . "' action='javascript:void(null);' onsubmit='cargarProducto(\"$codigo\");'>";
    // Metemos ocultos los datos de los productos
    echo "<input type='hidden' name='cod' value='" . $p->getcodigo() . "'/>";
    echo " <input type='submit' name='enviar' value='Añadir'/>";
    echo $p->getnombrecorto() . ": ";
    echo $p->getPVP() . " euros.";
    echo "</form>";
    echo "</p>";
  }
}

function muestraCestaCompra($cesta) {
  echo "<h3><img src='cesta.png' alt='Cesta' width='24' height='21'> Cesta</h3>";
  echo "<hr />";
  echo "<div id='contenido'>";
  $cesta->muestra();
  echo "</div>";
  echo "<form id='vaciar' action='javascript:void(null);' onsubmit='vaciarCesta();'>";
  echo "<input type='submit' id='btnvaciar' name='vaciar' value='Vaciar Cesta' ";
  if ($cesta->vacia())
    echo "disabled='true'";
  echo "/></form>";
  echo "<form id='comprar' action='cesta.php' method='post'>";
  echo "<input type='submit' id='btncomprar' name='comprar' value='Comprar' ";
  if ($cesta->vacia())
    echo "disabled='true'";
  echo "/></form>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 7 : Aplicaciones web dinámicas: PHP y Javascript -->
<!-- Tarea: Cesta de la compra con Xajax: productos.php -->
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Ejemplo Tema 5: Listado de Productos</title>
    <link href="tienda.css" rel="stylesheet" type="text/css">
    
    <!-- Incluimos el código JavaScript necesario -->
    <?php $xajax->printJavascript(); ?>
    <script type="text/javascript" src="./include/fcesta.js"></script>
  </head>

  <body class="pagproductos">
    <span id="prueba">prueba</span>
    <div id="contenedor">
      <div id="encabezado">
        <h1>Listado de productos</h1>
      </div>
      <div id="cesta"><?php muestraCestaCompra($cesta); ?></div>
      <div id="productos"><?php creaFormularioProductos(); ?></div>
      <br class="divisor" />
      
      <div id="pie">
        <form action='logoff.php' method='post'>
          <input type='submit' name='desconectar' value='Desconectar usuario <?php echo $_SESSION['usuario']; ?>'/>
        </form>        
      </div>
    </div>
  </body>
</html>
