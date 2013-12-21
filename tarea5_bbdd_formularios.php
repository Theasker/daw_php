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
  <script>
    $(document).ready(function() {
      //$("body").css("background-color","blue");
      //$("div #errores").css("display", "block");
    });
  </script>
  <div>
    <p class="errores" id="user">El usuario tiene que tener entre 4 y 15 caracteres</p>
    <p class="errores" id="nom">El nombre no puede tener números y debe estar entre 2 y 20 caracteres</p>
    <p class="errores" id="ape">Los apellidos no pueden tener números y debe estar entre 2 y 40 caracteres</p>
    <p class="errores" id="mail">El correo electrónico no es válido</p>
    <p class="errores" id="dni">El formato del DNI es erróneo</p>
    <p class="errores" id="dir">La dirección es demasiado larga</p>
    <p class="errores" id="cp">El código postal no es correcto</p>
    <p class="errores" id="local">La ciudad es demasiado larga</p>
    <p class="errores" id="prov">La provincia es demasiado larga</p>
  </div>
  <fieldset>
    <legend>Datos personales para registrarse: </legend>
    <div class="formulario">
      <form action="tarea5_bbdd.php" method="POST">
        <label class="requerido" for="usuario">Usuario:
          <input type="text" id="usuario" name="usuario" value="Theasker" size="30"></label><br />
        <label class="requerido" for="nombre">Nombre: 
          <input type="text" id="nombre" name="nombre" value="Mauri" size="30"></label><br />
        <label class="requerido" for="apellidos">Apellidos:
          <input type="text" id="apellidos" name="apellidos" value="Segura Ariño" size="50"></label><br />
        <label class="requerido" for="email">E-mail:
          <input type="email" id="email" name="email" value="theasker@gmail.com" size="30"></label><br />
        <label class="requerido" for="dni">DNI:
          <input type="text" id="dni" name="dni" value="17740226G" size="9"></label><br />
        <label for="direccion">Dirección:
          <input type="text" id="direccion" name="direccion" value="García Sánchez, 3" size="50"></label><br />
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
