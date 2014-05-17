<!DOCTYPE html>
<!--
Tarea 7 de uso de sesiones
Alumno - Mauricio Segura Ariño
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title>Tarea 7 del uso de sesiones</title>
    <link rel="stylesheet" href="tarea7_sesiones.css">
  </head>
  <body>
    <?php
    session_start();
    $mensaje = "";
    $idioma = "";
    $perfil = "";
    $zona = "";
    // Si pulsamos el botón borrar eliminamos los datos de la sesión
    if (isset($_REQUEST['borrar'])) {
      // Comprobamos que hay datos de SESSION para borrar
      if (isset($_SESSION['idioma'])) {
        $mensaje = "Información de la sesión eliminada";
        session_unset();
      }else{ // No hay datos de session para borrar
        $mensaje = "No hay información para eliminar";
      }      
      $idioma = "";
      $perfil = "";
      $zona = "";
    } else {
      // Comprobamos que existen los datos de SESSION
      if (isset($_SESSION['idioma'])) {
        $idioma = $_SESSION['idioma'];
        $perfil = $_SESSION['publico'];
        $zona = $_SESSION['zona'];
      } else { // Se ha accedido a esta página sin datos de SESSION
        $idioma = "";
        $perfil = "";
        $zona = "";
      }
    }
    ?>
    <fieldset>
      <legend>Preferencias</legend>
      <span class="mensaje"><?php echo $mensaje ?></span>
      <form method="post" action="mostrar.php">
        <div class="campo">
          <label class="etiqueta" for="idioma">Idioma:</label><br>
          <label class="texto"><?php echo $idioma ?></label>
        </div>
        <div class="campo">
          <label class="etiqueta" for="publico">Perfil público:</label><br>
          <label class="texto"><?php echo $perfil ?></label>
        </div>
        <div class="campo">
          <label class="etiqueta" for="zona">Zona horaria:</label><br>
          <label class="texto"><?php echo $zona ?></label>
        </div><br>
        <input type="submit" name="borrar" value="Borrar preferencias"><br>
        <a href="preferencias.php">Establecer preferencias</a>
      </form>
    </fieldset>
  </body>
</html>
