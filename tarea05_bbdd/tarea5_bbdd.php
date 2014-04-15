<?php session_start(); ?>
<!DOCTYPE html>
<!--
Tarea 5 de DWES - Bases de datos
Alumno - Mauricio Segura Ariño
Desarrollar una web para almacenar datos de registro web de usuarios.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ejercicio 5 sobre Bases de Datos</title>
    <link rel="stylesheet" href="css/tarea5_bbdd.css"/>
    <link rel="stylesheet" href="css/formularios.css"/>
    <script src="./jquery-1.10.2_1.js"></script>

  </head>
  <body>
    <?php
    
    error_reporting(E_ALL);
    ini_set('display_errors', true);
    require './tarea5_bbdd_formularios.php';
    require './tarea5_bbddClass.php';
    require './tarea5_bbdd_validaciones.php';

    
    $bd = new tarea5_bbddClass();

    if (isset($_REQUEST['Registrarme'])) {
      frmRegistro();
    } elseif (isset($_REQUEST['Volver'])) {
      frmOpciones();
    } elseif (isset($_REQUEST['Registrar'])) {
      // validamos todos los campos
      if (validaciones($_REQUEST['usuario'], $_REQUEST['nombre'], $_REQUEST['apellidos'], $_REQUEST['email'], $_REQUEST['dni'], $_REQUEST['direccion'], $_REQUEST['cp'], $_REQUEST['localidad'], $_REQUEST['provincia'])) {
        // Comprobamos que el usuario no está en la base de datos
        if ($bd->buscarUsuario($_REQUEST['usuario'])) {
          frmExistente();
        } else { // El usuario no existe y se registrará
          $temp = generaPass();
          $pass = $temp[0]; // Contraseña sin cofificar
          $passCodificada = $temp[1]; // Contraseña coficada (hash)
          $bd->insertarDatos($_REQUEST['usuario'], $passCodificada, $_REQUEST['nombre'], $_REQUEST['apellidos'], $_REQUEST['email'], $_REQUEST['dni'], $_REQUEST['direccion'], $_REQUEST['cp'], $_REQUEST['localidad'], $_REQUEST['provincia']);
          enviarEmail($_REQUEST['email'], $_REQUEST['usuario'], $pass);
        }
      } else { // no se ha validado el formulario
        varSesion();
        frmRegistroInvalido();
      }
    } elseif (isset($_REQUEST['Mostrar'])) {
      $bd->mostrarTodosDatos();
    } elseif (isset($_REQUEST['Acceder'])) {
      frmAcceso();
    } elseif (isset($_REQUEST['Entrar'])) {
      $bd->validarUserPass($_REQUEST['usuario'], $_REQUEST['pass']);
    } else {
      frmOpciones();
    }
    // Destruimos la variable de conexión para que se cierre la base de datos.
    unset($bd);
    //var_dump($_REQUEST);
    ?>
  </body>
</html>
