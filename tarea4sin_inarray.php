<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Tarea 4 de Desarrollo Web Entorno Servidor - Agenda de contactos</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/estilos.css" />
  </head>
  <body>
    <div class="contenedor">
      <center>
        <h1>Tarea 3 - Desarrollo Web Entorno Servidor</h1>
        Mauricio Segura Ariño
        <p><h2>Pequeña agenda <a href="http://manuel.servidor.infenlaces.com/agenda.php">(ejemplo)</a></p><hr></h2></center>
      <div class="contenido">
        <?php
        $matriz_agenda = array();

        // Comprobamos que se ha pulsado el botón enviar
        if (isset($_REQUEST['enviar'])) {
          // agregamos todos los contactos anteriores que vienen del formulario
          // menos el que se acaba de agregar que se añade posteriormente
          foreach ($_REQUEST as $key => $value) {
            if (($key <> 'accion') && ($key <> 'nombre') && ($key <> 'telefono') && ($key <> 'enviar')) {
              $matriz_agenda["$key"] = $value;
            }
          }
          if (!empty($_REQUEST['nombre'])) { // Comprobamos que se ha introducido un nombre
            // compruebo que el nombre introducido no está en el array
            // si está lo sobreescribo.
            if (comprobacion($matriz_agenda)) { //duplicado
              echo "duplicado<br />";
              // Existe el nombre y el campo teléfono está vacío.
              if (empty($_REQUEST['telefono']) || $_REQUEST['telefono'] == '') {
                echo "lo borro<br />";
                unset($matriz_agenda[$_REQUEST['nombre']]); // Eliminamos el elemento
              } else
                $matriz_agenda[$_REQUEST['nombre']] = $_REQUEST['telefono'];
            }
            else { // NO duplicado
              // Comprobamos que se ha introducido el teléfono
              if (!empty($_REQUEST['telefono'])) {
                $matriz_agenda[$_REQUEST['nombre']] = $_REQUEST['telefono'];
              } else { // No se ha introducido el teléfono
                echo "Debes introducir un numero de teléfono<br />";
              }
            }
          } else { // El campo nombre está vacío
            if (empty($_REQUEST['nombre']))
              echo "Debes introducir un nombre<br />";
          }
          echo '<div class="encuadre">';
          echo "<h3>Contactos de la agenda</h3>";
          echo "<table>";
          echo "<tr><th>Nombre</th><th>Teléfono</th></tr>";
          $cont = 0;
          // Mostramos todos los contactos de la agenda
          foreach ($matriz_agenda as $nom => $num) {
            echo "<tr><td>$nom (" . gettype($nom) . ")</td><td>$num (" . gettype($num) . ")</td></tr>";
            $cont++;
          }
          echo "</table>";
          echo "Hay un total de $cont contactos en la agenda";
          echo '</div>';
        }

        // Si hemos pulsado el botón borrar eliminamos la matriz
        if (isset($_REQUEST['borrar'])) {
          if (isset($matriz_agenda)) {
            unset($matriz_agenda);
            $matriz_agenda = array();
          }
        }
        echo '<div class="encuadre">';
        echo '<form  action =./tarea4sin_inarray.php method="post">';
        if (isset($matriz_agenda)) { // sólo hacemos el proceso si existe el array.
          foreach ($matriz_agenda as $nom => $num) {
            echo '<input type="hidden" name="' . $nom . '" value="' . $num . '">';
          }
        }
        echo '<label>Nombre: </label><input type="text" name="nombre"/><br />';
        echo '<label>Teléfono: </label><input type="text" name="telefono"/><br />';
        echo '<p><input type="submit" value ="Añadir Contacto" name="enviar">';
        echo '<input type="submit" value ="Vaciar agenda" name="borrar"><p/>';
        echo '</form>';
        echo '</div>';

        function comprobacion($matriz) {
          foreach ($matriz as $nom => $num) {
            if ($nom ==  $_REQUEST('nombre')) {
              return true;
            }
            return false;
          }
        }

        var_dump($_REQUEST);
        var_dump($matriz_agenda);
        ?>
      </div>
    </div>
  </body>
</html>