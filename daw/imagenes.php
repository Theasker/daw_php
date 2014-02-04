<!DOCTYPE html>
<!--
Página que muestra las imágenes que hay en un directorio en 3 columnas.
    <IMG src="mifoto.jpg" width="100" height="100"/>
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title></title>
  </head>
  <body>
    <?php
    // directorio de origen
    $path = './imagenes';

    // Abrimos directorio
    $iddir = @opendir($path) or die("No puedo abrir la ruta $path");
    
    // Recorremos los fichero y directorios del path
    $cont = 0;
    while ($file = readdir($iddir)) {
      $fich = $path."/".$file;
      if(is_file($fich)){
        $trozos = explode(".", $file);
        $ext = end($trozos);
        if($ext == "jpg" || $ext == "gif" || $ext == "jpeg" || $ext == "png"){
          echo '<IMG src="'.$fich.'" width="150"/>';
          $cont++;
        }
        if($cont == 3){
          echo "<br>";
          $cont = 0;
        }
      }
    }
    closedir($iddir);
    ?>
  </body>
</html>
