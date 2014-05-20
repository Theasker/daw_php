<?php
require_once './Server.php';

//Sin WSDL -> uri es obligatorio
$uri = "http://localhost/www/dwes/php/tarea9_servicios_web/Sin_fichero_WSDL/";
$server = new SoapServer(null, array('uri' => $uri));

$server->setClass('Server');
$server->handle();
?>
