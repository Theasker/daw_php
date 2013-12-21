<!DOCTYPE html>
<!--
Tarea 5 de DWES - Bases de datos
Alumno - Mauricio Segura Ariño
Desarrollar una web para almacenar datos de registro web de usuarios.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 3 sobre Bases de Datos</title>
    <link rel="stylesheet" href="css/tarea5_bbdd.css" />
    <script src="./jquery-1.10.2_1.js"></script>
    <script>
      $(document).ready(function() {
        //$("body").css("background-color","blue");
        //$("div #user").css("display","block");
      });
    </script>
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
    } elseif (isset($_REQUEST['Registrar'])) {
      //validarEmail($_REQUEST['email']);
      if (validaciones($_REQUEST['usuario'], $_REQUEST['nombre'], $_REQUEST['apellidos']
                      , $_REQUEST['email'], $_REQUEST['dni'], $_REQUEST['direccion'], "password", $_REQUEST['cp'], $_REQUEST['localidad'], $_REQUEST['provincia'])) {
        $bd->insertarDatos($_REQUEST['usuario'], $_REQUEST['nombre'], $_REQUEST['apellidos']
                , $_REQUEST['email'], $_REQUEST['dni'], $_REQUEST['direccion'], "password", $_REQUEST['cp'], $_REQUEST['localidad'], $_REQUEST['provincia']);
      }else{ // no se ha validado el formulario
        frm_registro();
      }
    } else {
      frm_acceso();
    }

    var_dump($_REQUEST);

    unset($bd);
    ?>
  </body>
</html>
