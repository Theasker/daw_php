<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Tarea 6 - Bases de Datos PDO</title>
    <link href="css/dwes.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div id="encabezado">
      <form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <?php
        require './tarea6BbddPdoClass.php';

        // Inicializamos la base de datos
        $bd = new tarea6BbddPdoClass();

        if (isset($_REQUEST['mostrar'])) {
          $bd->mostrarCabeceraListado($_REQUEST['familia']);
        } else {
          $bd->mostrarCabeceraListado(null);
        }
        ?>
      </form>
    </div>
    <div id="contenido">
      <?php
      if (isset($_REQUEST['familia'])) {
        if ($_REQUEST['familia'] != '' || $_REQUEST['familia'] != null) {
          $bd->mostrarContenidoListado($_REQUEST['familia']);
        }
      }
      ?>
    </div>

    <div id="pie">
    </div>
  </body>
</html>
