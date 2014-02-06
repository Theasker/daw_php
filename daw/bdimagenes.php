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
        $pos = strpos($_FILES['foto']['type'],'image/');
        echo $pos;
        if ($pos === false){
          // si el formato no es correcto emitimos un error
          echo ('Formato de archivo no reconocido.');
        } else {
          // Si el formato de imagen el correcto la cargamos en la BD
          $imagen = $_FILES['foto']['tmp_name']; //contenido del archivo
          $nomimagen = $_FILES['foto']['name']; //nombre
          $tipoimagen = $_FILES['foto']['type']; //tipo
          $tamimagen = $_FILES['foto']['size']; //tamaño

          $fp = fopen($imagen, 'rb'); //abrimos el archivo binario "imagen" en modo lectura
          $contenido = fread($fp, $tamimagen); //lee el archivo hasta el tamaño de la imagen
          $contenido = addslashes($contenido); //Añadimos caracteres de escape
          fclose($fp); //cerramos el archivo

          DB::guardarFoto($contenido);
        }
      }
    }

    var_dump($_FILES);
    var_dump($_REQUEST);

    class DB {

      protected static function crearTabla() {
        $sql = <<<SQL
CREATE TABLE IF NOT EXISTS `timagenes` (
  `id_imagenes` int(6) NOT NULL AUTO_INCREMENT,
  `imagen` blob NOT NULL,
  PRIMARY KEY (`id_imagenes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;
SQL;
        self::ejecutaConsulta($sql);
      }

      protected static function ejecutaConsulta($sql) {
        try {
          $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
          $dsn = "mysql:host=127.0.0.1;dbname=bdimagenes";
          $usuario = 'root';
          $contrasena = '';
          $basedatos = new PDO($dsn, $usuario, $contrasena, $opc);
          $resultado = null;
          if (isset($basedatos))
            $resultado = $basedatos->query($sql);
          //mysql_close($basedatos);
          return $resultado;
        } catch (PDOException $ex) {
          echo $ex->getCode() . ": " . $ex->getMessage();
        }
      }

      public static function guardarFoto($contenido) {
        $sql = <<<SQL
INSERT INTO timagenes('imagen') values ('$contenido');
SQL;
        self::crearTabla();
        $res = self::ejecutaConsulta($sql);
        var_dump($res);
      }

      public static function mostrarFotos() {
        $sql = "SELECT imagen FROM timagenes;";
        $resultado = self::ejecutaConsulta($sql);
        var_dump($resultado);
      }

    }
    ?>
  </body>
</html>
