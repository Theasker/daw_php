<!DOCTYPE html>
<!--
Carga imagenes en una base de datos y luego las visualiza
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <form action="./bdimagenes.php" method="post" enctype="multipart/form-data"> 
      Seleccione el archivo: 
      <input type="file" name="foto"><br> 
      <input type="submit" value="Subir archive" accept="image/jpeg" />
    </form>
    <?php
    if (isset($_FILES['foto']['error'])) {
      if ($_FILES['foto']['error'] != 0) { // si ha habido un error
        echo "ha habido un problema al subir la imagen, súbela de nuevo";
      } else {
        // si se ha seleccionado una imagen validamos la extensión
        $imagentmp = $_FILES['foto']['tmp_name'];
        // comprobamos que sea una imagen buscando la cadena 'image/'
        $pos = strpos($_FILES['foto']['type'], 'image/');
        echo $pos;
        if ($pos === false) {
          // si el formato no es correcto emitimos un error
          echo ('Formato de archivo no reconocido.');
        } else {
          // Si el formato de imagen el correcto la cargamos en la BD
          $imagen = $_FILES['foto']['tmp_name']; //contenido del archivo
          //$nomimagen = $_FILES['foto']['name']; //nombre
          //$tipoimagen = $_FILES['foto']['type']; //tipo
          $tamimagen = $_FILES['foto']['size']; //tamaño
          
          //abrir la imagen para lectura
          $lectura_imagen=fopen($imagen, "rb");   
 
          //convertir la imagen en código binario
          $imagen_binario = addslashes(fread($lectura_imagen, filesize($imagen)));

          DB::guardarFoto($imagen_binario);
          }
      }
    }

    var_dump($_FILES);
    var_dump($_REQUEST);

    class DB {
      protected static function conexion() {
        try {
          $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
          $dsn = "mysql:host=theasker.infenlaces.com;dbname=theasker_varios";
          $usuario = 'Theasker';
          $contrasena = 'Theasker';
          $basedatos = new PDO($dsn, $usuario, $contrasena, $opc);
          return $basedatos;
        } catch (PDOException $ex) {
          echo $ex->getCode() . ": " . $ex->getMessage();
        }
      }
      protected static function sqlAccion($sql) {
        try {
          $basedatos = self::conexion();
          $resultado = null;
          if (isset($basedatos)){
            $resultado = $basedatos->exec($sql);
            return $resultado;
          }          
        } catch (PDOException $ex) {
          echo $ex->getCode() . ": " . $ex->getMessage();
        }
      }
      protected static function sqlSeleccion($sql) {
        try {
          $basedatos = self::conexion();
          $resultado = null;
          if (isset($basedatos)){
            $resultado = $basedatos->query($sql);
            return $resultado;
          }
        } catch (PDOException $ex) {
          echo $ex->getCode() . ": " . $ex->getMessage();
        }
      }
      protected static function crearTabla() {
        $sql = <<<SQL
CREATE TABLE IF NOT EXISTS `timagenes` (
  `id_imagenes` int(6) NOT NULL AUTO_INCREMENT,
  `imagen` mediumblob NOT NULL,
  PRIMARY KEY (`id_imagenes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;
SQL;
        $resultado = self::sqlAccion($sql);
        if ($resultado == 0){
          echo "No se ha creado ninguna tabla<br>";
        }
      }
      public static function guardarFoto($contenido) {
        $sql = "INSERT INTO timagenes('imagen') VALUES('$contenido');";
        self::crearTabla();
        $resultado = self::sqlAccion($sql);
        if ($resultado == 0){
          echo "No se ha agregado la imagen a la BD";
        }
        var_dump($resultado);
      }
      public static function mostrarFotos() {
        $sql = "SELECT imagen FROM timagenes;";
        $resultado = self::sqlSeleccion($sql);
        var_dump($resultado);
      }
    }
    ?>
  </body>
</html>
