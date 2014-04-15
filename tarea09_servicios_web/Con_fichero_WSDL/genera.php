<?php

//serverW.php es el fichero descrito anteriormente,
// donde se implementan los métodos que se se ofrecen
require_once 'ServerW.php';
require_once 'WSDLDocument.php'; //script que generará el fichero xml 

$url = "http://localhost/www/dwes/php/tarea9_servicios_web/Con_fichero_WSDL/ServerW.php";
$uri = "http://localhost/www/dwes/php/tarea9_servicios_web/Con_fichero_WSDL/";


//serviciow.php es el fichero que genera el objeto servidor soap 
$accion = new WSDLDocument("ServerW", $url, $uri);


header('Content-Type: text/xml');
echo $accion->saveXML(); //Genera el en  navegador el fichero xml que hay que revisar
/* LOS PARAMETROS DE WSDLDOCUMENT(   )
  1º: El nombre de la clase que gestionará las peticiones al servicio.
  2º: La URL en que se ofrece el servicio.
  3º: El espacio de nombres destino.
 * */
?>