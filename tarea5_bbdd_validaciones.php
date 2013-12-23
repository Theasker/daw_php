<?php

function validaciones($user, $nom, $ape, $email, $dni, $dir, $cp, $local, $prov) {
  $validado = true;
  $jquery = "";
  if (!validarUser($user)) {
    $validado = false;
    $jquery = $jquery . '$("div>#user").css("display", "block");';
  }
  if (!validarNom($nom)) {
    $validado = false;
    $jquery = $jquery . '$("div>#nom").css("display", "block");';
  }
  if (!validarApe($ape)) {
    $validado = false;
    $jquery = $jquery . '$("div>#ape").css("display", "block");';
  }
  if (!validarEmail($email)) {
    $validado = false;
    $jquery = $jquery . '$("div>#mail").css("display", "block");';
  }
  if (!validarDni($dni)) {
    $validado = false;
    $jquery = $jquery . '$("div>#dni").css("display", "block");';
  }
  if (!validarDir($dir)) {
    $validado = false;
    $jquery = $jquery . '$("div>#dir").css("display", "block");';
  }
  if (!validarCp($cp)) {
    $validado = false;
    $jquery = $jquery . '$("div>#cp").css("display", "block");';
  }
  if (!validarLocal($local)) {
    $validado = false;
    $jquery = $jquery . '$("div>#local").css("display", "block");';
  }
  if (!validarProv($prov)) {
    $validado = false;
    $jquery = $jquery . '$("div>#prov").css("display", "block");';
  }

  if (!$validado) { // Si ha habido algún error
    $temp = "<script>"
            . '$(document).ready(function() {'
            . $jquery . '});</script>';

    echo $temp;
  }
  return $validado;
}

// validamos el usuario /^[a-z\d_]{4,15}$/
function validarUser($user) {
  if (filter_var($user, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^.{4,15}$/")))) {
    return true;
  } else {
    return false;
  }
}

// validamos el nombre /^\D{2,20}$/
function validarNom($nom) {
  if (filter_var($nom, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^\D{2,20}$/")))) {
    return true;
  } else {
    return false;
  }
}

// validamos el apellido.
function validarApe($ape) {
  if (filter_var($ape, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^\D{2,40}$/")))) {
    return true;
  } else {
    return false;
  }
}

function validarEmail($email) {
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return true;
  } else {
    return false;
  }
}

function validarDni($dni) {
  if (filter_var($dni, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^\d{8}[a-zA-Z]$/")))) {
    return true;
  } else {
    return false;
  }
}

function validarDir($dir) {
  if ((filter_var($dir, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^.{0,50}$/")))) || ($dir == "") || ($dir == null)) {
    return true;
  } else {
    return false;
  }
}

function validarCp($cp) {
  if ((filter_var($cp, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^([1-9]{2}|[0-9][1-9]|[1-9][0-9])[0-9]{3}$/")))) || ($cp == "") || ($cp == null)) {
    return true;
  } else {
    return false;
  }
}

function validarLocal($local) {
  if ((filter_var($local, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^\D{0,30}$/")))) || ($local == "") || ($local == null)) {
    return true;
  } else {
    return false;
  }
}

function validarProv($prov) {
  if ((filter_var($prov, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^\D{0,30}$/")))) || ($prov == "") || ($prov == null)) {
    return true;
  } else {
    return false;
  }
}

function generaPass() {
//Se define una cadena de caractares. Te recomiendo que uses esta.
  $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
//Obtenemos la longitud de la cadena de caracteres
  $longitudCadena = strlen($cadena);

//Se define la variable que va a contener la contraseña
  $pass = "";
//Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
  $longitudPass = 10;

//Creamos la contraseña
  for ($i = 1; $i <= $longitudPass; $i++) {
//Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
    $pos = rand(0, $longitudCadena - 1);

//Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
    $pass .= substr($cadena, $pos, 1);
  }
  // $claveCodificada = sha1($pass);
  $claveCodificada = password_hash($pass, PASSWORD_BCRYPT);
  $arrayPass[] = $pass;
  $arrayPass[] = $claveCodificada;
  validarPass($pass, $claveCodificada);
  return $arrayPass;
}

function validarPass($pass, $hash) {
  if (password_verify($pass, $hash)) {
    return true;
  } else {
    return false;
  }
}

function enviarEmail($email, $usuario, $pass) {

  
  $email_from = "admin@theasker.com";
  $destinatario = $email;
  $asunto = "Alta en web usuarios";
  $cuerpo = "Ha sido dado de alta con estos datos: \nUsuario: $usuario \nContraseña: $pass";

  $headers = 'From: ' . $email_from . "\r\n" .
          'Reply-To: ' . $email_from . "\r\n" .
          'X-Mailer: PHP/' . phpversion();
  
  if(!mail($destinatario, $asunto, $cuerpo,$headers)){
    echo "No se ha podido enviar el correo con la contraseña $pass";
  }
}
?>
