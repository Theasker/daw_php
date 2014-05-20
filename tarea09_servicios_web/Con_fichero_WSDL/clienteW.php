<?php

require_once 'ServerW.php';

//Instanciamos un objeto de la case ServerW
//Esta clase se ha generado automáticamente por la herramienta wsdl2php
$cliente = new ServerW();

// Probamos a obtener el array con todas las familias
$familias = $cliente->getFamilias();
print_r($familias);
print "<br />";

// Probamos a obtener todos los productos de una familia
$productos = $cliente->getProductosFamilia("ORDENA");
print_r($productos);
print "<br />";

// Probamos a obtener el precio de un producto
$pvp = $cliente->getPVP("KSTMSDHC8GB");
print("El PVP es " . $pvp);
print "<br />";

// Probamos a obtener el stock de un producto en una tienda
$unidades = $cliente->getStock("KSTMSDHC8GB", 3);
print("Existen " . $unidades . " unidades");
?>
