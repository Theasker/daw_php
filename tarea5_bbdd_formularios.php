<?php
// Función para visualizar la elección de acceso o registro
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

// Función para visualizar el formulario de registro.
function frm_registro() {
  ?>
  <fieldset>
    <legend>Datos personales para registrarse: </legend>
    <div class="formulario">
      <form action="tarea5_bbdd.php" method="POST">
        <label for="usuario">Usuario:
        <input type="text" id="usuario" name="usuario" value="Theasker" size="30"></label><br />
        <label for="nombre">Nombre:
        <input type="text" id="nombre" name="nombre" value="Mauri" size="30"></label><br />
        <label for="apellidos">Apellidos:
        <input type="text" id="apellidos" name="apellidos" value="Segura Ariño" size="50"></label><br />
        <label for="email">E-mail:
        <input type="email" id="email" name="email" value="theasker@gmail.com" size="30"></label><br />
        <label for="dni">DNI:
        <input type="text" id="dni" name="dni" value="17740226G" size="9"></label><br />
        <label for="direccion">Dirección:
        <input type="text" id="direccion" name="direccion" value="" size="50"></label><br />
        <label for="cp">Código Postal:
        <input type="text" id="cp" name="cp" value="50005" size="5"></label><br />
        <label for="localidad">Localidad:
        <input type="text" id="localidad" name="localidad" value="Zaragoza" size="30"></label><br />
        <label for="privincia">Provincia:
        <input type="text" id="provincia" name="provincia" value="Zaragoza" size="30"></label><br />
        <input type="submit" name="Registrar" value="Registrar">
        <input type="submit" name="Volver" value="Volver">
      </form>
    </div>
  </fieldset>
  <?php
}
?>
