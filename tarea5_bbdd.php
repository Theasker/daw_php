<!DOCTYPE html>
<!--
Tarea 5 de DWES - Bases de datos
Alumno - Mauricio Segura Ariño
Desarrollar una web para almacenar datos de registro web de usuarios.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
    require './tarea5_bbdd_formularios.php';
    require './tarea5_bbddClass.php';
    require './tarea5_bbdd_validaciones.php';

    $bd = new tarea5_bbddClass();
    $bd->borrarTabla();
    $bd->crearTabla();
    //$bd->insertarDatosEjemplo();

    if (isset($_REQUEST['Registrarme'])) {
      frm_registro();
    } elseif (isset($_REQUEST['Volver'])) {
      frm_acceso();
    } elseif(isset($_REQUEST['Registrar'])) {
      validarEmail($_REQUEST['email']);
    }

    var_dump($_REQUEST);

    unset($bd);
    ?>
  </body>
</html>
