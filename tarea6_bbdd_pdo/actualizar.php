<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <link href="css/dwes.css" rel="stylesheet" type="text/css">
    <title></title>
  </head>
  <body>
    <div id="encabezado">
      <h1>Tarea: Actualización</h1>
    </div>
    <div id="contenido">
      <?php
      require './tarea6BbddPdoClass.php';

      // Inicializamos la base de datos
      $bd = new tarea6BbddPdoClass();
      $bd->edicionProducto($_REQUEST['cod_prod']);
      var_dump($_REQUEST);
      ?>
    </div>

    <div id="pie">
    </div>
  </body>
</html>
