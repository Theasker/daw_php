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
        <h1>Tarea 3 - Desarrollo Web Entorno Servidor
          <p>Pequeña agenda <a href="http://manuel.servidor.infenlaces.com/agenda.php">(ejemplo)</a></p><hr></h1></center>
      <div class="contenido">
        <?php
        echo "<h3>Contactos de la agenda</h3>";
        $matriz_agenda = array();

        // Comprobamos que se ha pulsado el botón enviar
        if (isset($_REQUEST['enviar'])) {
          // agregamos todos los contactos anteriores que vienen del formulario
          // menos el que se acaba de agregar que se añade posteriormente
          foreach ($_REQUEST as $key => $value) {
            if (($key <> 'accion') && ($key <> 'nombre') && ($key <> 'telefono') && ($key <> 'enviar')) {
              $matriz_agenda[] = [$key => $value];
            }
          }
          // comprobamos que los campos no están vacios
          if (!empty($_REQUEST['nombre']) && !empty($_REQUEST['telefono'])) {
            
            // compruebo que el nombre introducido no está en el array
            // si está lo sobreescribo.
            $encontrado = false;
            foreach ($matriz_agenda as $key => $value) {
              if (in_array($_REQUEST['nombre'], $matriz_agenda[$key])) { //duplicado
                $encontrado = true;
                echo "El nombre introducido ya estaba en el array<br />";
                $matriz_agenda[$key] = [$_REQUEST['nombre'] => $_REQUEST['telefono']];
              }
            }
            if (!$encontrado) { // Si no está duplicado
              $matriz_agenda[] = [$_REQUEST['nombre'] => $_REQUEST['telefono']];
            }
            
          } else { // Alguno de los campos nombre y/o telefono están vacios
            if (empty($_REQUEST['nombre']))
              echo "Debes introducir un nombre<br />";
            if (empty($_REQUEST['telefono']))
              echo "Debes introducir un telefono<br />";
          }
          echo '<div class="encuadre">';
          echo "<table>";
          echo "<tr><th>Nombre</th><th>Teléfono</th></tr>";
          $cont = 0;
          // Mostramos todos los contactos de la agenda
          foreach ($matriz_agenda as $value) {
            foreach ($value as $key => $value2) {
              echo "<tr><td>$key</td><td>$value2</td></tr>";
              $cont++;
            }
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
        echo '<form  action =./tarea4.php method="post">';
        if (isset($matriz_agenda)) { // sólo hacemos el proceso si existe el array.
          foreach ($matriz_agenda as $key => $value) {
            foreach ($value as $key2 => $value2) {
              echo '<input type="hidden" name="' . $key2 . '" value="' . $value2 . '">';
            }
          }
        }
        echo '<input type="hidden" name="accion" value="nuevo">';
        echo '<label>Nombre:</label><input type="text" name="nombre"/><br/>';
        echo '<label>Teléfono </label><input type="text" name="telefono"/><br/>';
        echo '<input type="submit" value ="Añadir Contacto" name="enviar">';
        echo '<input type="submit" value ="Vaciar agenda" name="borrar"><br/>';
        echo '</form>';
        echo '</div>';
        echo 'var_dump($_REQUEST);';
        var_dump($_REQUEST);
        echo 'var_dump($matriz_agenda);';
        var_dump($matriz_agenda);
        ?>

      </div>
    </div>
  </body>
</html>