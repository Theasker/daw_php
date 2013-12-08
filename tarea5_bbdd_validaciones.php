<?php

function validarEmail() {
  if (!$correo = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL))
    echo "Correo NO válido";
  else
    echo "Válido";
}
?>
