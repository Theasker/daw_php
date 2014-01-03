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
    $mensaje = "";
    if (isset($_REQUEST['establecer'])) {
      session_start();
      $mensaje = "Información guardada en la sesión.";
      $_SESSION['idioma'] = $_REQUEST['idioma'];
      $_SESSION['publico'] = $_REQUEST['publico'];
      $_SESSION['zona'] = $_REQUEST['zona'];
    }
    var_dump($_REQUEST);
    //var_dump($_SESSION);
    ?>
    <fieldset>
      <legend>Preferencias</legend>
      <span class="mensaje"><?php echo $mensaje ?></span>
      <form method="post" action="preferencias.php">
        <div class="campo">
          <label class="etiqueta" for="idioma">Idioma:</label>
          <select name="idioma">
            <?php
            if (isset($_REQUEST['idioma'])) {
              if ($_REQUEST['idioma'] == 'español') {
                echo '<option value="español" selected>español</option>';
                echo '<option value="inglés">inglés</option>';
              } else {
                echo '<option value="español">español</option>';
                echo '<option value="inglés" selected>inglés</option>';
              }
            } else {
              echo '<option value="español">español</option>';
              echo '<option value="inglés">inglés</option>';
            }
            ?>
          </select>
        </div>
        <div class="campo">
          <label class="etiqueta" for="publico">Perfil público:</label>
          <select name="publico">
            <?php
            if (isset($_REQUEST['publico'])) {
              if ($_REQUEST['publico'] == 'si') {
                echo '<option value = "si" selected>Sí</option>';
                echo '<option value = "no">No</option>';
              } else {
                echo '<option value = "si">Sí</option>';
                echo '<option value = "no" selected>No</option>';
              }
            } else {
              echo '<option value = "si">Sí</option>';
              echo '<option value = "no">No</option>';
            }
            ?>
          </select>
        </div>
        <div class="campo">
          <label class="etiqueta" for="zona">Zona horaria:</label>
          <select name="zona">
            <?php
            if (isset($_REQUEST['publico'])) {

              switch ($_REQUEST['zona']) {
                case 'GTM-2':
                  $html = <<<HTML
            <option value="GTM-2" selected>GMT-2</option>
            <option value="GTM-1">GMT-1</option>
            <option value="GTM">GMT</option>
            <option value="GTM+1">GMT+1</option>
            <option value="GTM+2">GMT+2</option>                   
HTML;
                  break;
                case 'GTM-1':
                  $html = <<<HTML
            <option value="GTM-2">GMT-2</option>
            <option value="GTM-1" selected>GMT-1</option>
            <option value="GTM">GMT</option>
            <option value="GTM+1">GMT+1</option>
            <option value="GTM+2">GMT+2</option>                   
HTML;
                  break;
                case 'GTM':
                  $html = <<<HTML
            <option value="GTM-2">GMT-2</option>
            <option value="GTM-1">GMT-1</option>
            <option value="GTM" selected>GMT</option>
            <option value="GTM+1">GMT+1</option>
            <option value="GTM+2">GMT+2</option>                   
HTML;
                  break;
                case 'GTM+1':
                  $html = <<<HTML
            <option value="GTM-2">GMT-2</option>
            <option value="GTM-1">GMT-1</option>
            <option value="GTM">GMT</option>
            <option value="GTM+1" selected>GMT+1</option>
            <option value="GTM+2">GMT+2</option>                   
HTML;
                  break;
                case 'GTM+2':
                  $html = <<<HTML
            <option value="GTM-2">GMT-2</option>
            <option value="GTM-1">GMT-1</option>
            <option value="GTM">GMT</option>
            <option value="GTM+1">GMT+1</option>
            <option value="GTM+2" selected>GMT+2</option>                   
HTML;
                  break;
                default:
                  break;
              }
              
            }else{
              $html = <<<HTML
            <option value="GTM-2">GMT-2</option>
            <option value="GTM-1">GMT-1</option>
            <option value="GTM">GMT</option>
            <option value="GTM+1">GMT+1</option>
            <option value="GTM+2">GMT+2</option>                   
HTML;
            }
            echo $html;
            ?>
          </select>
        </div><br>
        <input type="submit" name="establecer" value="Establecer preferencias"><br>
        <a href="mostrar.php">Mostrar preferencias</a>
      </form>
    </fieldset>
  </body>
</html>
