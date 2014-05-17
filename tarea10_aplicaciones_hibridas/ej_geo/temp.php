<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
    require_once './../ej_geo/xajax_core/xajax.inc.php';
    $respuesta = new xajaxResponse();
     $direccion = 'garcia+sanchez, 3';
     $ciudad = 'Zaragoza';
     $pais = 'spain';
     $busqueda = 'http://maps.google.com/maps/api/geocode/json?address=garcia+sanchez,zaragoza,spain&language=es&sensor=false';
     var_dump($busqueda);
    ?>
  </body>
</html>
