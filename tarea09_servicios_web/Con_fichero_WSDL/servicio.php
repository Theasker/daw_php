<?php
require_once './ServerW.php';

$xml = "http://localhost/www/dwes/php/tarea9_servicios_web/Con_fichero_WSDL/serviciow.wsdl.xml";
$server = new SoapServer($xml);

$server->setClass('ServerW');
$server->handle();
?>
