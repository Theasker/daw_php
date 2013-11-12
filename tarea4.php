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
          <p>Pequeña agenda</p><hr></h1></center>
      <div class="contenido">
        <?php
        echo "<h3>Contactos de la agenda</h3>";

        if (!isset($matriz_agenda)) {
          $matriz_agenda = array();
          echo "array inicializado";
        }
        /*
          $matriz_agenda[]=["nombre"=>"Mauri","numero"=>1234564];
          $matriz_agenda[]=["nombre"=>"Sonia","numero"=>12345454];
         */
        var_dump($matriz_agenda);
        if ($_REQUEST['accion'] == 'nuevo') {
          array_push($matriz_agenda, array("nombre" => $_REQUEST['nombre'], "numero" => $_REQUEST['telefono']));
          echo "array pusheado";
        }
        var_dump($matriz_agenda);

        mostrar_form();
        var_dump($_REQUEST);

        function mostrar_form() {
          echo '<form  action =./tarea4.php method="post">';
          
          //echo '<input type="hidden" name="accion" value="nuevo">';
          echo '<label>Nombre:</label><input type="text" name="nombre"/><br/>';
          echo '<label>Teléfono </label><input type="text" name="telefono"/><br/>';
          echo '<input type="submit" value ="Añadir Contacto"><br/>';
          echo '</form>';
        }
        ?>

      </div>
    </div>
  </body>
</html>