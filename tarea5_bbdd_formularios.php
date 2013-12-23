<?php

// Función para visualizar la elección de acceso o registro
function frmOpciones() {
  ?>
  <h1>Web con acceso restringido</h1>
  <fieldset id="acceso">
    <legend>Opciones de acceso</legend>
    <form action="tarea5_bbdd.php" method="POST">
      <input type="submit" name="Acceder" value="Acceder">
      <input type="submit" name="Registrarme" value="Registrarme">
    </form>
  </fieldset>
  <?php
}

// Guardamos los datos introducidos para usarlos en caso de error de validación
function varSesion() {
  $_SESSION['usuario'] = $_POST['usuario'];
  $_SESSION['nombre'] = $_POST['nombre'];
  $_SESSION['apellidos'] = $_POST['apellidos'];
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['dni'] = $_POST['dni'];
  $_SESSION['direccion'] = $_POST['direccion'];
  $_SESSION['cp'] = $_POST['cp'];
  $_SESSION['localidad'] = $_POST['localidad'];
  $_SESSION['provincia'] = $_POST['provincia'];
}

function frmRegistro() {
  ?>
  <div class="cajaerrores">
    <p class="errores" id="user">El usuario tiene que tener entre 4 y 15 caracteres</p>
    <p class="errores" id="nom">El nombre no puede tener números y debe estar entre 2 y 20 caracteres</p>
    <p class="errores" id="ape">Los apellidos no pueden tener números y debe estar entre 2 y 40 caracteres</p>
    <p class="errores" id="mail">El correo electrónico no es válido</p>
    <p class="errores" id="dni">El formato del DNI es erróneo</p>
    <p class="errores" id="dir">La dirección es demasiado larga</p>
    <p class="errores" id="cp">El código postal no es correcto</p>
    <p class="errores" id="local">La ciudad es demasiado larga o con números u otros carácteres</p>
    <p class="errores" id="prov">La provincia es demasiado larga o con números u otros carácteres</p>
  </div>


  <div class="formulario">
    <form action="tarea5_bbdd.php" method="POST">
      <fieldset>
        <legend  id="registro">Datos personales para registrarse: </legend>
        <div class="registro"><label for="usuario">Usuario *:</label>
          <input class="requerido"  type="text" id="usuario" name="usuario" value="" size="30" title="Requerido: entre 4 y 15 caracteres.">
          <label for="nombre">Nombre *: </label>
          <input class="requerido" type="text" id="nombre" name="nombre" value="" size="30" title="Requerido entre 4 y 20 caracteres.">
          <label for="apellidos">Apellidos *:</label>
          <input class="requerido" type="text" id="apellidos" name="apellidos" value="" size="50" title="Requerido entre 4 y 40 caracteres.">
          <label for="email">E-mail *:</label>
          <input class="requerido" type="email" id="email" name="email" value="" size="30" title="Requerido introduce un correo válido">
          <label for="dni">DNI *:</label>
          <input class="requerido" type="text" id="dni" name="dni" value="" size="9" title="Requerido: introduce un DNI válido">
          <label for="direccion">Dirección:</label>
          <input type="text" id="direccion" name="direccion" value="" size="50" title="No requerido: Si lo introduce no debe exceder de 50 carácteres">
          <label for="cp">Código Postal:</label>
          <input type="text" id="cp" name="cp" value="" size="5" title="No requerido: Si">
          <label for="localidad">Localidad:</label>
          <input type="text" id="localidad" name="localidad" value="" size="30">
          <label for="privincia">Provincia:</label>
          <input type="text" id="provincia" name="provincia" value="" size="30">
          <div id="botones">
            <input type="submit" name="Registrar" value="Registrar">
            <input type="submit" name="Volver" value="Volver">
          </div>
      </fieldset>
    </form>
  </div>

  <?php
}

// Formulario de registro.

function frmRegistroInvalido() {
  ?>
  <div class="cajaerrores">
    <p class="errores" id="user">El usuario tiene que tener entre 4 y 15 caracteres</p>
    <p class="errores" id="nom">El nombre no puede tener números y debe estar entre 2 y 20 caracteres</p>
    <p class="errores" id="ape">Los apellidos no pueden tener números y debe estar entre 2 y 40 caracteres</p>
    <p class="errores" id="mail">El correo electrónico no es válido</p>
    <p class="errores" id="dni">El formato del DNI es erróneo</p>
    <p class="errores" id="dir">La dirección es demasiado larga</p>
    <p class="errores" id="cp">El código postal no es correcto</p>
    <p class="errores" id="local">La ciudad es demasiado larga o con números u otros carácteres</p>
    <p class="errores" id="prov">La provincia es demasiado larga o con números u otros carácteres</p>
  </div>

  <div class="formulario">
    <form action="tarea5_bbdd.php" method="POST">
      <fieldset id="registro">
        <legend>Datos personales para registrarse: </legend>
        <label for="usuario">Usuario *:</label>
        <input class="requerido" type="text" id="usuario" name="usuario" value="<?php echo $_SESSION['usuario'] ?>" size="30">
        <label for="nombre">Nombre *: </label>
        <input class="requerido" type="text" id="nombre" name="nombre" value="<?php echo $_SESSION['nombre'] ?>" size="30">
        <label for="apellidos">Apellidos *:</label>
        <input class="requerido" type="text" id="apellidos" name="apellidos" value="<?php echo $_SESSION['apellidos'] ?>" size="50">
        <label for="email">E-mail *:</label>
        <input class="requerido" type="email" id="email" name="email" value="<?php echo $_SESSION['email'] ?>" size="30">
        <label for="dni">DNI *:</label>
        <input class="requerido" type="text" id="dni" name="dni" value="<?php echo $_SESSION['dni'] ?>" size="9">
        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" value="<?php echo $_SESSION['direccion'] ?>" size="50">
        <label for="cp">Código Postal:</label>
        <input type="text" id="cp" name="cp" value="<?php echo $_SESSION['cp'] ?>" size="5">
        <label for="localidad">Localidad:</label>
        <input type="text" id="localidad" name="localidad" value="<?php echo $_SESSION['localidad'] ?>" size="30">
        <label for="privincia">Provincia:</label>
        <input type="text" id="provincia" name="provincia" value="<?php echo $_SESSION['provincia'] ?>" size="30">
        <div id="botones">
          <input type="submit" name="Registrar" value="Registrar">
          <input type="submit" name="Volver" value="Volver">
        </div>
      </fieldset>
    </form>
  </div>

  <?php
}

function frmAcceso() {
  ?>
  <fieldset>
    <legend>Acceso a tu datos: </legend>
    <div class="formulario">
      <form action="tarea5_bbdd.php" method="POST">
        <label class="requerido" for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" size="30">
        <label class="requerido" for="nombre">Contraseña:</label>
        <input type="text" id="pass" name="pass" size="30">
        <div id="botones">
          <input type="submit" name="Entrar" value="Entrar">
          <input type="submit" name="Volver" value="Volver">
        </div>
      </form>
    </div>
  </fieldset>
  <?php
}

function frmNoExiste() {
  ?>
  <fieldset>
    <legend>Usuario no encontrado</legend>
    <form action="tarea5_bbdd.php" method="POST">
      <p id="alerta">El usuario introducido no se ha encontrado en la base de datos.</p>
      <input type="submit" name="Volver" value="Volver">
    </form>
  </fieldset>
  <?php
}

function frmPassIncorrecto() {
  ?>
  <fieldset>
    <legend>Contraseña errónea</legend>
    <form action="tarea5_bbdd.php" method="POST">
      <p id="alerta">La contraseña introducida no es correcta.</p>
      <input type="submit" name="Acceder" value="Volver">
    </form>
  </fieldset>
  <?php
}

function frmExistente() {
  ?>
  <fieldset>
    <legend>Usuario existente</legend>
    <form action="tarea5_bbdd.php" method="POST">
      <p id="alerta">El usuario ya está registrado y no se agregará de nuevo</p>
      <input type="submit" name="Volver" value="Volver">
    </form>
  </fieldset>
  <?php
}

function frmAgregado($user, $email) {
  ?>
  <fieldset>
    <legend>Usuario agregado</legend>
    <form action="tarea5_bbdd.php" method="POST">
      <p id="alerta">El usuario <?php echo $user ?> ha sido registrado 
        y se te enviará la contraseña a tu correo <?php echo $email ?></p>
      <input type="submit" name="Volver" value="Volver">
    </form>
  </fieldset>
  <?php
}

function frmDatosUsuario($datos) {

  echo '<form action="tarea5_bbdd.php" method="POST">';
  echo "<fieldset>";
  echo "<legend>Bienvenido, estos son los datos del usuario <strong>" . $datos['usuario'] . "</strong></legend>";
  foreach ($datos as $key => $value) {
    if (($key == 'idUsuario') || ($key == 'pass')) {
      continue;
    } else {
      echo '<p id="datos"><strong>' . ucwords($key) . "</strong>: $value</p>";
    }
  }
  echo '<div id="botones"><input type="submit" name="Volver" value="Volver"></div>';
  echo "</fieldset>";
  echo "</form>";
}
?>
