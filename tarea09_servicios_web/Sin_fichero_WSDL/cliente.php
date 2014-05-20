<?php
$url = "http://localhost/www/dwes/php/tarea9_servicios_web/Sin_fichero_WSDL/servicio.php";
$uri = "http://localhost/www/dwes/php/tarea9_servicios_web/Sin_fichero_WSDL/";
 
//Creamos un cliente para llamar a esa URL. 
//Es obligatorio establecer el parámetro 'uri' al no tener WSDL , 
//igual que ocurría al instanciar el objeto SoapServer
 
$cliente = new SoapClient(null, array('location'=>$url,'uri'=>$uri));
 
//Ahora consumiremos todos los servicios de que disponemos
var_dump($cliente->getPVP('3DSNG'));
var_dump($cliente->getFamilias());
var_dump($cliente->getProductosFamilia('ORDENA'));
var_dump($cliente->getStock('OPTIOLS1100',1));
?>