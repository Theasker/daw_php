<?php

/**
 * Description of tarea6BbddPdoClass
 * Clase para todas las acciones en la base de datos
 * @author theasker
 */
class tarea6BbddPdoClass {

  public $dwes;

  function __construct() {
    try {
      $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
      $this->dwes = new PDO('mysql:host=theasker.infenlaces.com;dbname=dwes', 'theasker', 'theasker', $opciones);
      $this->dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $ex) {
      echo $ex->getCode() . ": " . $ex->getMessage();
    }
  }

  function mostrarCabeceraListado($familia) {
    echo "<h1>Tarea: Listado de productos de una familia</h1>";
    echo '<label for="familia">Familia: </label>';
    $resultado = $this->dwes->query("SELECT * FROM familia");
    echo '<select name="familia">';
    if ($familia == null || $familia == '') {
      echo '<option value="" selected="true">Selecciona una opción</option>';
    }
    while ($row = $resultado->fetch()) {
      // Si hemos pasado un producto como parámetro, es decir, 
      // que hay una familia seleccionada y se ha pulsado el boton "mostrar productos"
      if ($familia != null && $familia == $row['cod']) {
        echo '<option value="' . $row['cod'] . '" selected="true">' . $row['nombre'] . '</option>';
      } else {
        echo '<option value="' . $row['cod'] . '">' . $row['nombre'] . '</option>';
      }
    }
    echo '</select>';
    echo '<input type="submit" name="mostrar" value="Mostrar productos">';
  }

  function mostrarContenidoListado($familia) {
    echo '<h2>Productos de la familia: </h2>';
    $resultado = $this->dwes->query('SELECT * FROM producto WHERE familia = "' . $familia . '"');
    
    while ($row = $resultado->fetch()) {
      echo '<form id="form_edicion" action="editar.php" method="post">';
      echo "<p>Producto " . $row['nombre_corto'] . ": " . $row['PVP'] . " euros.";
      echo '<input type="submit" name="editar" value="Editar"></p>';
      echo '<input type="hidden" name="cod_prod" value="' . $row['cod'] . '">';
      echo "</form>";
    }    
  }

  function edicionProducto($cod) {
    echo '<form method="post" action="actualizar.php">';
    echo '<h2>Producto:</h2>';
    try {
      $sql = 'SELECT * FROM producto WHERE cod = "'.$cod.'"';
      $resultado = $this->dwes->query($sql);
      $registro = $resultado->fetch();
      $nombre_corto = $registro['nombre_corto'];
      $nombre = $registro['nombre'];
      $descripcion = $registro['descripcion'];
      $pvp = $registro['PVP'];
      $htmlcode = <<<HTML
              <form method="post" action="actualizar.php">
                <p><label for="nombre_corto">Nombre corto: </label>
                <input name="nombre_corto" type="text" size="80" value="$nombre_corto"></p>
                <p><label for="nombre">Nombre:</label><br>
                <textarea name="nombre" rows="3" cols="80">$nombre</textarea></p>
                <p><label for="descripcion">Descripción:</label><br>
                <textarea name="descripcion" rows="8" cols="80" >$descripcion</textarea></p>
                <p><label for="pvp">PVP: </label>
                <input name="pvp" type="text" size="10" value="$pvp"></p>
              <table>
              <tr><td>
                <input type="hidden" name="cod" value="$cod">
                <input type="submit" name="actualizar" value="Actualizar"></td>
              </form>
              <td>
              <form method="post" action="listado.php">
                <input type="submit" name="Cancelar" value="Cancelar">
              </form>
              </td></tr></table>
HTML;
      echo $htmlcode;
    } catch (PDOException $ex) {
      echo $ex->getCode().": ".$ex->getMessage();
    }
    echo '</form>';
  }
  
  function actualizacionProducto($cod,$nombre,$nombre_corto,$descripcion,$pvp){
    try{
      $sql = <<<SQL
UPDATE producto SET 
  nombre="$nombre",
  nombre_corto="$nombre_corto$",
  descripcion="$descripcion",
  pvp="$pvp"
  WHERE cod = "$cod"
SQL;
      if($this->dwes->exec($sql)){
        echo "<h2>Se han actualizado los datos correctamente</h2>";
      }
      else{
        echo "<h2>No se han podido actualizar los datos</h2>";
      }
    } catch (PDOException $ex) {
      echo $ex->getCode().": ".$ex->getMessage();
    }
  }
}
