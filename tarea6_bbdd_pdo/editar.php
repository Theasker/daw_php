<!DOCTYPE html>
<!--
Página que muestra la información de un producto para poder actualizarla
-->
<html>
  <head>
    <meta charset="UTF-8">
    <link href="css/dwes.css" rel="stylesheet" type="text/css">
    <title></title>
  </head>
  <body>
    <div id="encabezado">
      <h1>Tarea: Edición de un producto</h1>
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
