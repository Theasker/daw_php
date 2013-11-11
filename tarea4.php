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
      <h1>Tarea 2 - Desarrollo Web Entorno Servidor
	<p>Acciones básicas</p><hr></h1></center>
    <div class="contenido">
<?php

?>
      <form  action =./agenda.php method="post">
		
	<!-- Metemos los contactos existentes  ocultos en el formulario-->	
	<input type="hidden" name="agenda[111]" value="111"/><br>		<input type="hidden" name="action" value="nuevo">
		<label>Nombre:</label><input type="text" name="nombre"/><br/>
		<label>Teléfono </label><input type="text" name="telefono"/><br/>
		<input type="submit" value ="Añadir Contacto"><br/>
	</form>
    </div>
  </div>
</body>
</html>