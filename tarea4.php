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
       
//        $matriz_agenda[] = ["Mauri" => 123456];
//        $matriz_agenda[] = ["Sonia" => 1234567];
        var_dump($matriz_agenda);
        
        
        if (isset($_REQUEST['enviar'])) {
          // comprobamos que los campos no están vacios
          if(!empty($_REQUEST['nombre']) && !empty($_REQUEST['telefono'])){
            foreach ($matriz_agenda as $key => $value) {
              echo $key;
            }
            array_push($matriz_agenda, array($_REQUEST['nombre'] => $_REQUEST['telefono']));
          }else{ // Alguno de los campos nombre y/o telefono están vacios
            if(empty($_REQUEST['nombre']))
              echo "Debes introducir un nombre";
            if(empty($_REQUEST['telefono']))
              echo "Debes introducir un telefono";
          }
        }
        //var_dump($matriz_agenda);

        echo '<form  action =./tarea4.php method="post">';
        foreach ($matriz_agenda as $key => $value) {
          //echo '<input type="hidden" name="'.$matriz_agenda["nombre"].'" value="'.$matriz_agenda["telefono"].'">';
          foreach ($value as $key2 => $value2) {
            //echo "$key\t$key2 \t \t \t$value2<br />";
            echo '<input type="hidden" name="'.$key2.'" value="'.$value2.'">';
          }
        }
        echo '<input type="hidden" name="accion" value="nuevo">';
        echo '<label>Nombre:</label><input type="text" name="nombre"/><br/>';
        echo '<label>Teléfono </label><input type="text" name="telefono"/><br/>';
        echo '<input type="submit" value ="Añadir Contacto" name="enviar"><br/>';
        echo '</form>';
        echo 'var_dump($_REQUEST);';
        var_dump($_REQUEST);
        echo 'var_dump($matriz_agenda);';
        var_dump($matriz_agenda);
        ?>

      </div>
    </div>
  </body>
</html>