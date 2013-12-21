<?php

function validaciones($user, $nom, $ape, $email, $dni, $dir, $cp, $local, $prov) {
  $validado = true;
  $jquery = "";
  if (!validarUser($user)) {
    $validado = false;
    $jquery = $jquery . '$("div #user").css("display", "block");';
  }
  if (!validarNom($nom)) {
    $validado = false;
    $jquery = $jquery . '$("div #nom").css("display", "block");';
  }
  if (!validarApe($ape)) {
    $validado = false;
    $jquery = $jquery . '$("div #ape").css("display", "block");';
  }
  if (!validarEmail($email)) {
    $validado = false;
    $jquery = $jquery . '$("div #mail").css("display", "block");';
  }
  if (!validarDni($dni)) {
    $validado = false;
    $jquery = $jquery . '$("div #dni").css("display", "block");';
  }
  if (!validarDir($dir)) {
    $validado = false;
    $jquery = $jquery . '$("div #dir").css("display", "block");';
  }
  if (!validarCp($cp)) {
    $validado = false;
    $jquery = $jquery . '$("div #cp").css("display", "block");';
  }
  if (!validarLocal($local)) {
    $validado = false;
    $jquery = $jquery . '$("div #local").css("display", "block");';
  }
  if (!validarProv($prov)) {
    $validado = false;
    $jquery = $jquery . '$("div #prov").css("display", "block");';
  }

  if (!$validado) { // Si ha habido algún error
    $temp = "<script>";
    $temp = $temp . '$(document).ready(function() {';
    $jquery = $temp . $jquery;
    $jquery = $jquery . '});</script>';
    echo $jquery;
  }
  return $validado;
}

// validamos el usuario /^[a-z\d_]{4,15}$/
function validarUser($user) {
  if (filter_var($user, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^.{4,15}$/")))) {
    return true;
  } else {
    $jquery = '<h4>error en usuario</h4>';
    ?>
    <script>
      document.getElementById("user").style.display = "block";
      //$("div #user").css("display","block");

    </script>
    <?php

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
  if (filter_var($dir, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^.{0,50}$/")))) {
    return true;
  } else {
    return false;
  }
}

function validarCp($cp) {
  if (filter_var($cp, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^\d{5}$/")))) {
    return true;
  } else {
    return false;
  }
}

function validarLocal($local) {
  if (filter_var($local, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^\D{0,30}$/")))) {
    return true;
  } else {
    return false;
  }
}

function validarProv($prov) {
  if (filter_var($prov, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^\D{0,30}$/")))) {
    return true;
  } else {
    return false;
  }
}
?>
