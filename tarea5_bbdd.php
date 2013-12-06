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
    frm_acceso();
    frm_registro();
    // Función para
    function frm_acceso() {
      ?>
      <h1>Web con acceso restringido</h1>
      <fieldset>
        <legend>Opciones de acceso</legend>
        <form action="tarea5_bbdd.php" method="POST">
          <input type="submit" name="Acceder" value="Acceder">
          <input type="submit" name="Registrarme" value="Registrarme">
        </form>
      </fieldset>
      <?php
    }

    function frm_registro() {
      ?>

      <?php
    }
    ?>
  </body>
</html>
