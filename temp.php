<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Tarea 4 de Desarrollo Web Entorno Servidor - Agenda de contactos</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/estilos.css" />
  </head>
  <body>
    <?php
    $conexion = new mysqli('theasker.infenlaces.com', 'theasker', 'theasker', 'dwes');
    $error = $conexion->connect_errno;
    if ($error == null) {
      $resultado = $conexion->query('SELECT * FROM ');
      if ($resultado) {
        print "<p>Se han borrado $conexion->affected_rows registros.</p>";
      }
      $conexion->close();
    }
    ?>
  </body>
</html>