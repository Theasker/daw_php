<!DOCTYPE html>

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
      $bd->actualizacionProducto($_REQUEST['cod'],$_REQUEST['nombre'],$_REQUEST['nombre_corto'],
              $_REQUEST['descripcion'],$_REQUEST['pvp']);
      ?>
      <form method="post" action="listado.php">
        <input type="submit" name="continuar" value="Continuar">
      </form>
    </div>
    <div id="pie">
    </div>
  </body>
</html>
